<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Infrastructure\Services\AiServiceFactory;
use Easy\Router\Mapper\AttributeMapper;
use Override;
use Plugin\Domain\Context;
use Plugin\Domain\Hooks\ActivateHookInterface;
use Plugin\Domain\Hooks\DeactivateHookInterface;
use Plugin\Domain\PluginInterface;
use Shared\Infrastructure\Services\ModelRegistry;
use Twig\Loader\FilesystemLoader;

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
     * @param FilesystemLoader $loader TWIG loader for templates
     * @param AttributeMapper $mapper Route mapper for webhook endpoints
     * @param AiServiceFactory $factory AI service factory for registering services
     * @param ModelRegistry $registry Model registry for registering models
     */
    public function __construct(
        private FilesystemLoader $loader,
        private AttributeMapper $mapper,
        private AiServiceFactory $factory,
        private ModelRegistry $registry,
    ) {}

    #[Override]
    public function boot(Context $context): void
    {
        // DEBUG: Plugin is booting
        error_log("APIFrame Plugin: Boot method called");
        error_log("APIFrame Plugin: Registry available: " . ($this->registry ? 'YES' : 'NO'));

        // Add template path to the TWIG loader to scan for view templates 
        // in current directory. The first argument is the path to the directory,
        // the second argument is the namespace to use in the template.
        $this->loader->addPath(__DIR__, 'apiframe');

        // Add path to the router mapper to scan for routes 
        // in current directory (for webhook handling)
        $this->mapper->addPath(__DIR__);

        // Register the APIFrame image generation service
        $this->factory->register(ImageGeneratorService::class);

        // Register APIFrame models in the registry immediately when plugin boots
        try {
            error_log("APIFrame Plugin: Attempting to register models");
            $this->registerModels();
            error_log("APIFrame Plugin: Models registered successfully");
        } catch (\Exception $e) {
            error_log("APIFrame Plugin Error: " . $e->getMessage());
            error_log("APIFrame Plugin Stack Trace: " . $e->getTraceAsString());
        }
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
                    'description' => 'Professional Midjourney v6.1 image generation with enhanced prompt following',
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
                        'max_prompt_length' => 4000,
                        'supported_formats' => ['png', 'jpg', 'webp']
                    ],
                    'enabled' => true
                ],
                [
                    'type' => 'image', 
                    'key' => 'apiframe/midjourney-v7',
                    'name' => 'Midjourney v7',
                    'description' => 'Latest Midjourney v7 with improved image quality and style consistency',
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
                        'max_prompt_length' => 4000,
                        'supported_formats' => ['png', 'jpg', 'webp']
                    ],
                    'enabled' => true
                ],
                [
                    'type' => 'image',
                    'key' => 'apiframe/midjourney-v6.1-turbo',
                    'name' => 'Midjourney v6.1 (Turbo)',
                    'description' => 'Fast Midjourney v6.1 generation with turbo mode for quick results',
                    'custom' => true,
                    'provider' => [
                        'name' => 'APIFrame',
                        'icon' => '/assets/icons/monochrome/apiframe.svg'
                    ],
                    'rates' => [
                        [
                            'key' => 'apiframe-midjourney-v6.1-turbo',
                            'type' => 'image',
                            'unit' => 'image'
                        ]
                    ],
                    'config' => [
                        'mode' => 'turbo',
                        'max_prompt_length' => 4000,
                        'supported_formats' => ['png', 'jpg', 'webp']
                    ],
                    'enabled' => true
                ],
                [
                    'type' => 'image',
                    'key' => 'apiframe/midjourney-v7-turbo',
                    'name' => 'Midjourney v7 (Turbo)',
                    'description' => 'Fast Midjourney v7 generation with turbo mode for quick results',
                    'custom' => true,
                    'provider' => [
                        'name' => 'APIFrame',
                        'icon' => '/assets/icons/monochrome/apiframe.svg'
                    ],
                    'rates' => [
                        [
                            'key' => 'apiframe-midjourney-v7-turbo',
                            'type' => 'image',
                            'unit' => 'image'
                        ]
                    ],
                    'config' => [
                        'mode' => 'turbo',
                        'max_prompt_length' => 4000,
                        'supported_formats' => ['png', 'jpg', 'webp']
                    ],
                    'enabled' => true
                ]
            ]
        ];

        // Add the service to registry directory
        if (!isset($this->registry['directory'])) {
            $this->registry['directory'] = [];
        }

        // Check if APIFrame service already exists
        $existingIndex = null;
        foreach ($this->registry['directory'] as $index => $service) {
            if ($service['key'] === 'apiframe') {
                $existingIndex = $index;
                break;
            }
        }

        if ($existingIndex !== null) {
            // Update existing service
            $this->registry['directory'][$existingIndex] = $apiFrameService;
        } else {
            // Add new service
            $this->registry['directory'][] = $apiFrameService;
        }

        // Save the updated registry
        $this->registry->save();
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
