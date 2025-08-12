<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Domain\Entities\VideoEntity;
use Ai\Domain\ValueObjects\Progress;
use Ai\Domain\ValueObjects\State;
use Ai\Infrastructure\Services\CostCalculator;
use Billing\Domain\Events\CreditUsageEvent;
use File\Domain\Entities\FileEntity;
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

class VideoWebhookProcessor
{
    public function __construct(
        private Client $client,
        private CdnInterface $cdn,
        private CostCalculator $calc,
        private EventDispatcherInterface $dispatcher,
    ) {
    }

    public function __invoke(
        VideoEntity $entity,
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

        // Update progress if available
        if (isset($data->progress) && is_numeric($data->progress)) {
            $progressValue = (int)($data->progress * 100); // Convert to percentage
            $entity->setProgress(new Progress($progressValue));
        }

        // Handle failure case
        if ($entity->getState() == State::FAILED) {
            $entity->addMeta(
                'failure_reason',
                $data->error ?? $data->failureReason ?? 'Unknown error occurred'
            );
            return;
        }

        // Handle cover image (preview/thumbnail)
        if (
            !$entity->getCoverImage()
            && isset($data->thumbnailUrl)
            && filter_var($data->thumbnailUrl, FILTER_VALIDATE_URL)
        ) {
            try {
                $resp = $this->client->sendRequest('GET', $data->thumbnailUrl);
                $content = $resp->getBody()->getContents();

                $img = imagecreatefromstring($content);
                $width = imagesx($img);
                $height = imagesy($img);

                $key = $this->cdn->generatePath('jpg', $ws, $user);
                $this->cdn->write($key, $content);

                $imgFile = new ImageFileEntity(
                    new Storage($this->cdn->getAdapterLookupKey()),
                    new ObjectKey($key),
                    new Url($this->cdn->getUrl($key)),
                    new Size(strlen($content)),
                    new Width($width),
                    new Height($height),
                    BlurhashGenerator::generateBlurHash($img, $width, $height),
                );

                $entity->setCoverImage($imgFile);
            } catch (\Exception $e) {
                // Silently fail for thumbnail - not critical
            }
        }

        // Handle successful completion - download video
        if (
            $entity->getState() == State::COMPLETED
            && !$entity->getOutputFile()
            && isset($data->output)
            && is_array($data->output)
            && count($data->output) > 0
        ) {
            $videoUrl = $data->output[0]; // Get first generated video

            if (filter_var($videoUrl, FILTER_VALIDATE_URL)) {
                try {
                    // Download the generated video
                    $resp = $this->client->sendRequest('GET', $videoUrl);
                    $content = $resp->getBody()->getContents();

                    // Determine file extension from URL
                    $ext = pathinfo($videoUrl, PATHINFO_EXTENSION) ?: 'mp4';
                    if (empty($ext) || !in_array($ext, ['mp4', 'mov', 'avi', 'webm'])) {
                        $ext = 'mp4'; // Default fallback
                    }

                    // Save video to CDN
                    $key = $this->cdn->generatePath($ext, $ws, $user);
                    $this->cdn->write($key, $content);

                    // Create video file entity
                    $videoFile = new FileEntity(
                        new Storage($this->cdn->getAdapterLookupKey()),
                        new ObjectKey($key),
                        new Url($this->cdn->getUrl($key)),
                        new Size(strlen($content)),
                    );

                    $entity->setOutputFile($videoFile);

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
                } catch (\Exception $e) {
                    // Handle download failure
                    $entity->setState(State::FAILED);
                    $entity->addMeta('failure_reason', 'Failed to download generated video: ' . $e->getMessage());
                }
            }
        }
    }
}
