<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Infrastructure\Services\AiServiceFactory;
use Easy\Router\Mapper\AttributeMapper;
use Override;
use Plugin\Domain\Context;
use Plugin\Domain\PluginInterface;
use Twig\Loader\FilesystemLoader;

/**
 * APIFrame Midjourney Plugin
 * 
 * Integrates APIFrame's professional Midjourney API with Aikeedo.
 * Provides high-quality image generation using Midjourney v6.1 and v7.
 * 
 * @see https://docs.apiframe.ai/pro-midjourney-api/api-endpoints/imagine.md
 */
class Plugin implements PluginInterface
{
    /**
     * Plugin constructor. Inject required dependencies for the plugin.
     *
     * @param FilesystemLoader $loader TWIG loader for templates
     * @param AttributeMapper $mapper Route mapper for webhook endpoints
     * @param AiServiceFactory $factory AI service factory for registering services
     */
    public function __construct(
        private FilesystemLoader $loader,
        private AttributeMapper $mapper,
        private AiServiceFactory $factory,
    ) {}

    #[Override]
    public function boot(Context $context): void
    {
        // Add template path to the TWIG loader to scan for view templates 
        // in current directory. The first argument is the path to the directory,
        // the second argument is the namespace to use in the template.
        $this->loader->addPath(__DIR__, 'apiframe');

        // Add path to the router mapper to scan for routes 
        // in current directory (for webhook handling)
        $this->mapper->addPath(__DIR__);

        // Register the APIFrame image generation service
        $this->factory->register(ImageGeneratorService::class);
    }
}
