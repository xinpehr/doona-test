<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Infrastructure\Services\AiServiceFactory;
use Override;
use Plugin\Domain\Context;
use Plugin\Domain\Hooks\ActivateHookInterface;
use Plugin\Domain\Hooks\DeactivateHookInterface;
use Plugin\Domain\PluginInterface;
use Shared\Infrastructure\Services\ModelRegistry;
use Psr\Container\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * APIFrame Midjourney Plugin
 * 
 * Integrates APIFrame's professional Midjourney API with Aikeedo.
 * Provides high-quality image generation using Midjourney v6.1 and v7.
 * 
 * @see https://docs.apiframe.ai/pro-midjourney-api/api-endpoints/imagine.md
 */
class Plugin implements PluginInterface, ActivateHookInterface, DeactivateHookInterface
{
    /**
     * Plugin constructor. Inject required dependencies for the plugin.
     *
     * @param AiServiceFactory $factory AI service factory for registering services
     * @param ModelRegistry $registry Model registry for registering models
     * @param ContainerInterface $container Dependency injection container
     * @param EventDispatcherInterface $dispatcher Event dispatcher for cron listener
     */
    public function __construct(
        private AiServiceFactory $factory,
        private ModelRegistry $registry,
        private ContainerInterface $container,
        private EventDispatcherInterface $dispatcher,
    ) {}

    #[Override]
    public function boot(Context $context): void
    {
        error_log("APIFrame Plugin: Starting boot process (async mode)");

        // Register the APIFrame image generation service
        $this->factory->register(ImageGeneratorService::class);
        error_log("APIFrame Plugin: Registered ImageGeneratorService");

        // Register background processing listener
        $cronListener = $this->container->get(CronListener::class);
        $this->dispatcher->addSubscriber($cronListener);
        error_log("APIFrame Plugin: Registered CronListener for background processing");

        // Register APIFrame models in the registry immediately when plugin boots
        $this->registerModels();
        
        // JavaScript progress monitoring is available at /e/heyaikeedo/apiframe/apiframe-progress.js
        error_log("APIFrame Plugin: JavaScript progress monitoring available at /e/heyaikeedo/apiframe/apiframe-progress.js");
        
        error_log("APIFrame Plugin: Boot process completed");
    }

    #[Override]
    public function activate(Context $context): void
    {
        // Register APIFrame models when plugin is activated (backup method)
        $this->registerModels();
    }

    #[Override]
    public function deactivate(Context $context): void
    {
        // Remove APIFrame models when plugin is deactivated
        $this->removeModels();
    }

    /**
     * Register APIFrame Midjourney models in the model registry
     */
    private function registerModels(): void
    {
        error_log("APIFrame Plugin: Starting model registration");
        // Define APIFrame service configuration
        $apiFrameService = [
            'key' => 'apiframe',
            'name' => 'APIFrame',
            'icon' => '/assets/icons/monochrome/apiframe.svg',
            'custom' => true,
            'models' => [
                [
                    'type' => 'image',
                    'key' => 'apiframe/midjourney-v6.1',
                    'name' => 'Midjourney v6.1',
                    'description' => 'Professional Midjourney v6.1 image generation with enhanced prompt following. Supports fast and turbo modes.',
                    'custom' => true,
                    'provider' => [
                        'name' => 'APIFrame',
                        'icon' => '/assets/icons/monochrome/apiframe.svg'
                    ],
                    'rates' => [
                        [
                            'key' => 'apiframe-midjourney-v6.1',
                            'type' => 'image',
                            'unit' => 'image'
                        ]
                    ],
                    'config' => [
                        'mode' => 'fast',
                        'prompt_length' => 1000,
                        'negative_prompt' => false,
                        'supported_formats' => ['png', 'jpg', 'webp'],
                        'images' => [
                            'required' => false,
                            'limit' => 1,
                            'mime' => [
                                'image/png',
                                'image/jpeg',
                                'image/webp'
                            ]
                        ],
                        'params' => [
                            [
                                'key' => 'aspect_ratio',
                                'label' => 'Aspect Ratio',
                                'options' => [
                                    [
                                        'value' => '1:1',
                                        'label' => '1:1 (Square)'
                                    ],
                                    [
                                        'value' => '16:9',
                                        'label' => '16:9 (Landscape)'
                                    ],
                                    [
                                        'value' => '9:16',
                                        'label' => '9:16 (Portrait)'
                                    ],
                                    [
                                        'value' => '21:9',
                                        'label' => '21:9 (Ultrawide)'
                                    ],
                                    [
                                        'value' => '4:3',
                                        'label' => '4:3 (Standard)'
                                    ]
                                ]
                            ],
                            [
                                'key' => 'mode',
                                'label' => 'Generation Mode',
                                'options' => [
                                    [
                                        'value' => 'fast',
                                        'label' => 'Fast Mode'
                                    ],
                                    [
                                        'value' => 'turbo',
                                        'label' => 'Turbo Mode'
                                    ]
                                ]
                            ],
                            [
                                'key' => 'style',
                                'label' => 'Style',
                                'options' => [
                                    [
                                        'value' => 'raw',
                                        'label' => 'Raw Style'
                                    ],
                                    [
                                        'value' => 'natural',
                                        'label' => 'Natural'
                                    ],
                                    [
                                        'value' => 'artistic',
                                        'label' => 'Artistic'
                                    ],
                                    [
                                        'value' => 'cinematic',
                                        'label' => 'Cinematic'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'enabled' => true
                ],
                [
                    'type' => 'image', 
                    'key' => 'apiframe/midjourney-v7',
                    'name' => 'Midjourney v7',
                    'description' => 'Latest Midjourney v7 with improved image quality and style consistency. Supports fast and turbo modes.',
                    'custom' => true,
                    'provider' => [
                        'name' => 'APIFrame',
                        'icon' => '/assets/icons/monochrome/apiframe.svg'
                    ],
                    'rates' => [
                        [
                            'key' => 'apiframe-midjourney-v7',
                            'type' => 'image',
                            'unit' => 'image'
                        ]
                    ],
                    'config' => [
                        'mode' => 'fast',
                        'prompt_length' => 1000,
                        'negative_prompt' => false,
                        'supported_formats' => ['png', 'jpg', 'webp'],
                        'images' => [
                            'required' => false,
                            'limit' => 1,
                            'mime' => [
                                'image/png',
                                'image/jpeg',
                                'image/webp'
                            ]
                        ],
                        'params' => [
                            [
                                'key' => 'aspect_ratio',
                                'label' => 'Aspect Ratio',
                                'options' => [
                                    [
                                        'value' => '1:1',
                                        'label' => '1:1 (Square)'
                                    ],
                                    [
                                        'value' => '16:9',
                                        'label' => '16:9 (Landscape)'
                                    ],
                                    [
                                        'value' => '9:16',
                                        'label' => '9:16 (Portrait)'
                                    ],
                                    [
                                        'value' => '21:9',
                                        'label' => '21:9 (Ultrawide)'
                                    ],
                                    [
                                        'value' => '4:3',
                                        'label' => '4:3 (Standard)'
                                    ]
                                ]
                            ],
                            [
                                'key' => 'mode',
                                'label' => 'Generation Mode',
                                'options' => [
                                    [
                                        'value' => 'fast',
                                        'label' => 'Fast Mode'
                                    ],
                                    [
                                        'value' => 'turbo',
                                        'label' => 'Turbo Mode'
                                    ]
                                ]
                            ],
                            [
                                'key' => 'style',
                                'label' => 'Style',
                                'options' => [
                                    [
                                        'value' => 'raw',
                                        'label' => 'Raw Style'
                                    ],
                                    [
                                        'value' => 'natural',
                                        'label' => 'Natural'
                                    ],
                                    [
                                        'value' => 'artistic',
                                        'label' => 'Artistic'
                                    ],
                                    [
                                        'value' => 'cinematic',
                                        'label' => 'Cinematic'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'enabled' => true
                ]
            ]
        ];

        // Get current directory array to avoid indirect modification
        $directory = $this->registry['directory'] ?? [];

        // Check if APIFrame service already exists
        $existingIndex = null;
        foreach ($directory as $index => $service) {
            if ($service['key'] === 'apiframe') {
                $existingIndex = $index;
                break;
            }
        }

        if ($existingIndex !== null) {
            // Update existing service
            $directory[$existingIndex] = $apiFrameService;
        } else {
            // Add new service
            $directory[] = $apiFrameService;
        }

        // Set the updated directory back to registry
        $this->registry['directory'] = $directory;

        // Save the updated registry
        $this->registry->save();
        
        error_log("APIFrame Plugin: Models registered successfully. Total services: " . count($directory));
    }

    /**
     * Remove APIFrame models from the model registry
     */
    private function removeModels(): void
    {
        if (!isset($this->registry['directory'])) {
            return;
        }

        // Find and remove APIFrame service
        $updatedDirectory = [];
        foreach ($this->registry['directory'] as $service) {
            if ($service['key'] !== 'apiframe') {
                $updatedDirectory[] = $service;
            }
        }

        $this->registry['directory'] = $updatedDirectory;

        // Save the updated registry
        $this->registry->save();
    }
}
