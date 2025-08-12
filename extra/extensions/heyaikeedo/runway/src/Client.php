<?php

declare(strict_types=1);

namespace Aikeedo\Runway;

use Ai\Domain\Exceptions\ApiException;
use Easy\Container\Attributes\Inject;
use InvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * HTTP client for sending requests to the Runway API.
 * 
 * Based on Runway API documentation: https://docs.dev.runwayml.com/
 */
class Client
{
    private const BASE_URL = 'https://api.runway.ml';

    public function __construct(
        private ClientInterface $client,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,

        #[Inject('option.runway')]
        private ?string $apiKey = null,
    ) {
    }

    /**
     * Send HTTP request to Runway API
     *
     * @throws InvalidArgumentException
     * @throws ClientExceptionInterface
     * @throws ApiException
     */
    public function sendRequest(
        string $method,
        string $path,
        array $body = [],
        array $params = [],
        array $headers = []
    ): ResponseInterface {
        if (!$this->apiKey) {
            throw new InvalidArgumentException('Runway API key is not set');
        }

        $url = parse_url($path, PHP_URL_SCHEME) !== null
            ? $path
            : self::BASE_URL . '/' . ltrim($path, '/');

        $req = $this->requestFactory
            ->createRequest($method, $url)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Accept', 'application/json')
            ->withHeader('Authorization', 'Bearer ' . $this->apiKey);

        if ($params) {
            $req = $req->withUri(
                $req->getUri()->withQuery(http_build_query($params))
            );
        }

        foreach ($headers as $key => $value) {
            $req = $req->withHeader($key, $value);
        }

        if ($body && $method !== 'GET') {
            $req = $req->withBody(
                $this->streamFactory->createStream(json_encode($body))
            );
        }

        $resp = $this->client->sendRequest($req);
        $code = $resp->getStatusCode();

        if ($code === 401) {
            throw new ApiException('Incorrect Runway API key provided. Please contact your workspace owner.');
        } elseif ($code === 429) {
            throw new ApiException('Runway API rate limit exceeded. Please try again later.');
        } elseif ($code < 200 || $code >= 300) {
            $contents = $resp->getBody()->getContents();
            $body = json_decode($contents, true);

            $message = 'Unexpected error occurred while communicating with Runway API';
            if ($body && isset($body['error'])) {
                $message = $body['error']['message'] ?? $body['error'] ?? $message;
            } elseif ($body && isset($body['message'])) {
                $message = $body['message'];
            }

            throw new ApiException($message);
        }

        return $resp;
    }

    /**
     * Check if custom API key is being used
     */
    public function hasCustomKey(): bool
    {
        return !empty($this->apiKey);
    }
}
