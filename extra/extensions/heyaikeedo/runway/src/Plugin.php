<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Infrastructure\Services\AiServiceFactory;
use Easy\Router\Mapper\AttributeMapper;
use Override;
use Plugin\Domain\Context;
use Plugin\Domain\PluginInterface;
use Shared\Infrastructure\Services\ModelRegistry;
use Twig\Loader\FilesystemLoader;

class Plugin implements PluginInterface
{
    /**
     * Plugin constructor. Inject required dependencies for the plugin.
     *
     * @param FilesystemLoader $loader TWIG loader.
     * @param AttributeMapper $mapper Route mapper. 
     * @param AiServiceFactory $factory AI service factory.
     * @param ModelRegistry $modelRegistry Model registry for adding Runway models.
     */
    public function __construct(
        private FilesystemLoader $loader,
        private AttributeMapper $mapper,
        private AiServiceFactory $factory,
        private ModelRegistry $modelRegistry,
    ) {
    }

    #[Override]
    public function boot(Context $context): void
    {
        // Add template path to the TWIG loader to scan for view templates 
        // in current directory. The first argument is the path to the directory,
        // the second argument is the namespace to use in the template.
        $this->loader->addPath(__DIR__, 'runway');

        // Add path to the router mapper to scan for routes 
        // in current directory
        $this->mapper->addPath(__DIR__);

        // Register Runway AI services
        $this->factory
            ->register(ImageGeneratorService::class)
            ->register(VideoService::class);

        // Add Runway models to registry
        $this->addRunwayModelsToRegistry();
    }

    /**
     * Add Runway models to the model registry
     */
    private function addRunwayModelsToRegistry(): void
    {
        $directory = $this->modelRegistry['directory'] ?? [];
        
        // Find if runway provider already exists
        $runwayIndex = null;
        foreach ($directory as $index => $provider) {
            if ($provider['key'] === 'runway') {
                $runwayIndex = $index;
                break;
            }
        }

        // Runway provider configuration
        $runwayProvider = [
            'key' => 'runway',
            'name' => 'Runway',
            'icon' => '/assets/icons/monochrome/runway.svg',
            'models' => [
                // Gen4 Image - Advanced image generation with reference images
                [
                    'type' => 'image',
                    'key' => 'gen4_image',
                    'name' => 'Gen4 Image',
                    'description' => 'Advanced image generation with reference image support and style transfer capabilities',
                    'provider' => [
                        'name' => 'Runway',
                        'icon' => '/assets/icons/monochrome/runway.svg'
                    ],
                    'rates' => [
                        [
                            'key' => 'gen4_image',
                            'type' => null,
                            'unit' => 'image'
                        ]
                    ],
                    'config' => [
                        'prompt_length' => 500,
                        'negative_prompt' => false,
                        'reference_images' => [
                            'required' => false,
                            'limit' => 5,
                            'mime' => [
                                'image/png',
                                'image/jpeg',
                                'image/webp'
                            ]
                        ],
                        'params' => [
                            [
                                'key' => 'ratio',
                                'label' => 'Aspect Ratio',
                                'options' => [
                                    ['value' => '1920:1080', 'label' => '16:9 (1920x1080)'],
                                    ['value' => '1080:1920', 'label' => '9:16 (1080x1920)'],
                                    ['value' => '1024:1024', 'label' => '1:1 (1024x1024)'],
                                    ['value' => '1280:720', 'label' => '16:9 (1280x720)'],
                                    ['value' => '720:1280', 'label' => '9:16 (720x1280)'],
                                ]
                            ]
                        ]
                    ],
                    'enabled' => false
                ],
                // Gen4 Turbo - Fast video generation
                [
                    'type' => 'video',
                    'key' => 'gen4_turbo',
                    'name' => 'Gen4 Turbo',
                    'description' => 'Fast video generation with good quality and speed balance',
                    'provider' => [
                        'name' => 'Runway',
                        'icon' => '/assets/icons/monochrome/runway.svg'
                    ],
                    'rates' => [
                        [
                            'key' => 'gen4_turbo',
                            'type' => null,
                            'unit' => 'video'
                        ]
                    ],
                    'config' => [
                        'prompt_length' => 500,
                        'negative_prompt' => false,
                        'reference_images' => [
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
                                'key' => 'ratio',
                                'label' => 'Aspect Ratio',
                                'options' => [
                                    ['value' => '1920:1080', 'label' => '16:9 (1920x1080)'],
                                    ['value' => '1080:1920', 'label' => '9:16 (1080x1920)'],
                                    ['value' => '1024:1024', 'label' => '1:1 (1024x1024)'],
                                    ['value' => '1280:720', 'label' => '16:9 (1280x720)'],
                                    ['value' => '720:1280', 'label' => '9:16 (720x1280)'],
                                ]
                            ],
                            [
                                'key' => 'duration',
                                'label' => 'Duration',
                                'options' => [
                                    ['value' => '5', 'label' => '5 seconds'],
                                    ['value' => '10', 'label' => '10 seconds']
                                ]
                            ]
                        ]
                    ],
                    'enabled' => false
                ],
                // Gen4 Aleph - Highest quality video generation
                [
                    'type' => 'video',
                    'key' => 'gen4_aleph',
                    'name' => 'Gen4 Aleph',
                    'description' => 'Highest quality video generation model with advanced features',
                    'provider' => [
                        'name' => 'Runway',
                        'icon' => '/assets/icons/monochrome/runway.svg'
                    ],
                    'rates' => [
                        [
                            'key' => 'gen4_aleph',
                            'type' => null,
                            'unit' => 'video'
                        ]
                    ],
                    'config' => [
                        'prompt_length' => 500,
                        'negative_prompt' => false,
                        'reference_images' => [
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
                                'key' => 'ratio',
                                'label' => 'Aspect Ratio',
                                'options' => [
                                    ['value' => '1920:1080', 'label' => '16:9 (1920x1080)'],
                                    ['value' => '1080:1920', 'label' => '9:16 (1080x1920)'],
                                    ['value' => '1024:1024', 'label' => '1:1 (1024x1024)'],
                                    ['value' => '1280:720', 'label' => '16:9 (1280x720)'],
                                    ['value' => '720:1280', 'label' => '9:16 (720x1280)'],
                                ]
                            ],
                            [
                                'key' => 'duration',
                                'label' => 'Duration',
                                'options' => [
                                    ['value' => '5', 'label' => '5 seconds'],
                                    ['value' => '10', 'label' => '10 seconds']
                                ]
                            ]
                        ]
                    ],
                    'enabled' => false
                ]
            ]
        ];

        if ($runwayIndex !== null) {
            // Update existing provider
            $directory[$runwayIndex] = array_merge($directory[$runwayIndex], $runwayProvider);
        } else {
            // Add new provider
            $directory[] = $runwayProvider;
        }

        $this->modelRegistry['directory'] = $directory;
        $this->modelRegistry->save();
    }
}
