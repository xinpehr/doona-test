<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Domain\Entities\ImageEntity;
use Ai\Domain\Entities\VideoEntity;
use Easy\Container\Attributes\Inject;

class Helper
{
    public function __construct(
        #[Inject('option.site.domain')]
        private ?string $domain = null,

        #[Inject('option.site.is_secure')]
        private ?string $isSecure = null,
    ) {
    }

    /**
     * Generate callback URL for webhook notifications
     */
    public function getCallBackUrl(VideoEntity|ImageEntity $entity): string
    {
        $protocol = $this->isSecure ? 'https' : 'http';
        $domain = $this->domain;
        
        // Fallback to $_SERVER if domain is not configured
        if (empty($domain)) {
            $domain = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';
        }

        return sprintf(
            '%s://%s/webhooks/runway/%s',
            $protocol,
            $domain,
            $entity->getId()->getValue(),
        );
    }

    /**
     * Generate webhook URL for Runway API
     */
    public function getWebhookUrl(VideoEntity|ImageEntity $entity): string
    {
        return $this->getCallBackUrl($entity);
    }
}
