<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Domain\Entities\ImageEntity;
use Easy\Container\Attributes\Inject;

class Helper
{
    public function __construct(
        #[Inject('option.site.domain')]
        private ?string $domain = null,

        #[Inject('option.site.is_secure')]
        private ?string $isSecure = null,
    ) {}

    /**
     * Generate unique task reference for tracking
     */
    public function generateTaskReference(ImageEntity $image): string
    {
        return 'apiframe_' . $image->getId()->getValue() . '_' . time();
    }
}
