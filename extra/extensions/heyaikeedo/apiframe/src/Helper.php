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
     * Generate callback URL for webhooks
     */
    public function getCallBackUrl(ImageEntity $image): string
    {
        $protocol = $this->isSecure ? 'https' : 'http';
        $domain = $this->domain;

        return sprintf(
            '%s://%s/webhooks/apiframe/%s',
            $protocol,
            $domain,
            $image->getId()->getValue(),
        );
    }

    /**
     * Generate webhook secret for authentication
     */
    public function generateWebhookSecret(ImageEntity $image): string
    {
        return hash('sha256', 'apiframe_' . $image->getId()->getValue() . '_secret');
    }
}
