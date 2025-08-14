<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\ValueObjects\State;
use Ai\Infrastructure\Services\CostCalculator;
use Billing\Domain\ValueObjects\CreditCount;
use Billing\Domain\Events\CreditUsageEvent;
use Easy\Container\Attributes\Inject;
use File\Domain\Entities\ImageFileEntity;
use File\Domain\ValueObjects\Height;
use File\Domain\ValueObjects\ObjectKey;
use File\Domain\ValueObjects\Size;
use File\Domain\ValueObjects\Storage;
use File\Domain\ValueObjects\Url;
use File\Domain\ValueObjects\Width;
use Shared\Infrastructure\FileSystem\CdnInterface;
use Shared\Infrastructure\Helpers\BlurhashGenerator;
use stdClass;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * APIFrame Image Webhook Processor
 * 
 * Processes webhook responses from APIFrame API for image generation tasks.
 * Handles status updates, downloads completed images, and calculates costs.
 */
class ImageWebhookProcessor
{
    public function __construct(
        private Client $client,
        private CdnInterface $cdn,
        private CostCalculator $calc,
        private EventDispatcherInterface $dispatcher,

        #[Inject('option.features.is_safety_enabled')]
        private bool $checkSafety = true,
    ) {}

    public function __invoke(
        ImageEntity $entity,
        stdClass $data
    ): void {
        $user = $entity->getUser();
        $workspace = $entity->getWorkspace();

        // Update status based on webhook data
        $this->updateEntityStatus($entity, $data);

        if ($entity->getState() == State::FAILED) {
            // Store failure reason if available
            $failureReason = $data->error ?? $data->message ?? 'Unknown error occurred';
            $entity->addMeta('failure_reason', $failureReason);
            return;
        }

        // Process completed image
        if (
            $entity->getState() == State::COMPLETED
            && !$entity->getOutputFile()
            && isset($data->images) 
            && is_array($data->images) 
            && !empty($data->images)
        ) {
            try {
                // Get the first generated image
                $imageUrl = $data->images[0];
                
                if (!filter_var($imageUrl, FILTER_VALIDATE_URL)) {
                    throw new \Exception('Invalid image URL received');
                }

                // Download the image
                $resp = $this->client->sendRequest('GET', $imageUrl);
                $content = $resp->getBody()->getContents();

                if (empty($content)) {
                    throw new \Exception('Empty image content received');
                }

                // Get image dimensions
                $img = imagecreatefromstring($content);
                if (!$img) {
                    throw new \Exception('Invalid image data received');
                }

                $width = imagesx($img);
                $height = imagesy($img);

                // Save image to CDN
                $extension = pathinfo($imageUrl, PATHINFO_EXTENSION) ?: 'jpg';
                $key = $this->cdn->generatePath($extension, $workspace, $user);
                $this->cdn->write($key, $content);

                // Create image file entity
                $imageFile = new ImageFileEntity(
                    new Storage($this->cdn->getAdapterLookupKey()),
                    new ObjectKey($key),
                    new Url($this->cdn->getUrl($key)),
                    new Size(strlen($content)),
                    new Width($width),
                    new Height($height),
                    BlurhashGenerator::generateBlurHash($img, $width, $height),
                );

                $entity->setOutputFile($imageFile);

                // Calculate and apply cost if not already done
                if (!$entity->hasMeta('apiframe_cost_calculated')) {
                    $cost = $this->calculateCost($entity);
                    $entity->addCost($cost);
                    $entity->addMeta('apiframe_cost_calculated', true);

                    // Deduct credit from workspace
                    $workspace->deductCredit($cost);

                    // Dispatch credit usage event
                    $event = new CreditUsageEvent($workspace, $cost);
                    $this->dispatcher->dispatch($event);
                }

                imagedestroy($img);

            } catch (\Exception $e) {
                // Mark as failed if image processing fails
                $entity->setState(State::FAILED);
                $entity->addMeta('failure_reason', 'Image processing failed: ' . $e->getMessage());
            }
        }
    }

    /**
     * Update entity status based on webhook data
     */
    private function updateEntityStatus(ImageEntity $entity, stdClass $data): void
    {
        // APIFrame webhook status mapping
        if (isset($data->status)) {
            match ($data->status) {
                'pending', 'queued' => $entity->setState(State::QUEUED),
                'processing', 'in_progress' => $entity->setState(State::PROCESSING),
                'completed', 'success' => $entity->setState(State::COMPLETED),
                'failed', 'error' => $entity->setState(State::FAILED),
                default => null // Keep current state for unknown statuses
            };
        }

        // Handle progress updates if available
        if (isset($data->progress) && is_numeric($data->progress)) {
            $progress = max(0, min(100, (int)$data->progress));
            $entity->setProgress(new \Ai\Domain\ValueObjects\Progress($progress));
        }
    }

    /**
     * Calculate cost for the generated image
     */
    private function calculateCost(ImageEntity $entity): CreditCount
    {
        // Base cost calculation - 1 image generated
        $cost = $this->calc->calculate(1, $entity->getModel());

        // Apply mode-based multipliers if needed
        $mode = $entity->getMeta('apiframe_mode') ?? 'fast';
        if ($mode === 'turbo') {
            // Turbo mode might cost more - adjust multiplier as needed
            $cost = new CreditCount($cost->value * 1.5);
        }

        return $cost;
    }
}
