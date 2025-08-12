<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\ValueObjects\State;
use Ai\Infrastructure\Services\CostCalculator;
use Billing\Domain\Events\CreditUsageEvent;
use File\Domain\Entities\ImageFileEntity;
use File\Domain\ValueObjects\Height;
use File\Domain\ValueObjects\ObjectKey;
use File\Domain\ValueObjects\Size;
use File\Domain\ValueObjects\Storage;
use File\Domain\ValueObjects\Url;
use File\Domain\ValueObjects\Width;
use Shared\Infrastructure\FileSystem\CdnInterface;
use Shared\Infrastructure\Utils\BlurhashGenerator;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use stdClass;

class ImageWebhookProcessor
{
    public function __construct(
        private Client $client,
        private CdnInterface $cdn,
        private CostCalculator $calc,
        private EventDispatcherInterface $dispatcher,
    ) {
    }

    public function __invoke(
        ImageEntity $entity,
        stdClass $data
    ): void {
        $user = $entity->getUser();
        $ws = $entity->getWorkspace();

        // Update status based on Runway API response
        $status = $data->status ?? null;
        match ($status) {
            'PENDING' => $entity->setState(State::QUEUED),
            'RUNNING' => $entity->setState(State::PROCESSING),
            'SUCCEEDED' => $entity->setState(State::COMPLETED),
            'FAILED' => $entity->setState(State::FAILED),
            'CANCELLED' => $entity->setState(State::FAILED),
            default => null
        };

        // Handle failure case
        if ($entity->getState() == State::FAILED) {
            $entity->addMeta(
                'failure_reason',
                $data->error ?? $data->failureReason ?? 'Unknown error occurred'
            );
            return;
        }

        // Handle successful completion
        if (
            $entity->getState() == State::COMPLETED
            && !$entity->getOutputFile()
            && isset($data->output)
            && is_array($data->output)
            && count($data->output) > 0
        ) {
            $imageUrl = $data->output[0]; // Get first generated image

            if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
                // Download the generated image
                $resp = $this->client->sendRequest('GET', $imageUrl);
                $content = $resp->getBody()->getContents();

                // Determine file extension from URL or content type
                $ext = pathinfo($imageUrl, PATHINFO_EXTENSION) ?: 'jpg';
                if (empty($ext) || !in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                    $ext = 'jpg'; // Default fallback
                }

                // Save image to CDN
                $key = $this->cdn->generatePath($ext, $ws, $user);
                $this->cdn->write($key, $content);

                // Get image dimensions
                $img = imagecreatefromstring($content);
                $width = imagesx($img);
                $height = imagesy($img);

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

                // Calculate and deduct cost
                if (!$entity->hasMeta('runway_cost_calculated')) {
                    $cost = $this->calc->calculate(1, $entity->getModel());
                    $entity->addCost($cost);
                    $entity->addMeta('runway_cost_calculated', true);

                    // Deduct credit from workspace
                    $ws->deductCredit($cost);

                    // Dispatch credit usage event
                    $event = new CreditUsageEvent($ws, $cost);
                    $this->dispatcher->dispatch($event);
                }
            }
        }
    }
}
