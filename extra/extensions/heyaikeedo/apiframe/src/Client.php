<?php

declare(strict_types=1);

namespace Aikeedo\ApiFrame;

use Ai\Domain\Exceptions\ApiException;
use Easy\Container\Attributes\Inject;
use InvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * HTTP client for APIFrame Midjourney API.
 * 
 * Based on APIFrame documentation:
 * @see https://docs.apiframe.ai/pro-midjourney-api/api-endpoints/imagine.md
 */
class Client
{
    private const BASE_URL = 'https://api.apiframe.ai';
    private const FETCH_URL = 'https://api.apiframe.pro/fetch';

    public function __construct(
        private ClientInterface $client,
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,

        #[Inject('option.apiframe.api_key')]
        private ?string $apiKey = null,
    ) {}

    /**
     * Send request to APIFrame API
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
            throw new InvalidArgumentException('APIFrame API key is not set');
        }

        $url = $path === '/fetch' ? self::FETCH_URL : self::BASE_URL . $path;

        $req = $this->requestFactory
            ->createRequest($method, $url)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Accept', 'application/json')
            ->withHeader('Authorization', $this->apiKey);

        if ($params) {
            $req = $req->withUri(
                $req->getUri()->withQuery(http_build_query($params))
            );
        }

        foreach ($headers as $key => $value) {
            $req = $req->withHeader($key, $value);
        }

        if ($body) {
            $stream = $this->streamFactory->createStream(json_encode($body));
            $req = $req->withBody($stream);
        }

        $resp = $this->client->sendRequest($req);
        $code = $resp->getStatusCode();

        if ($code === 401) {
            throw new ApiException('Incorrect APIFrame API key provided. Please contact your workspace owner.');
        } elseif ($code === 400) {
            $contents = $resp->getBody()->getContents();
            $body = json_decode($contents, true);
            
            $msg = isset($body['errors']) && is_array($body['errors']) && !empty($body['errors'])
                ? $body['errors'][0]['msg'] ?? 'Bad request'
                : 'Bad request';
                
            throw new ApiException($msg);
        } elseif ($code < 200 || $code >= 300) {
            $contents = $resp->getBody()->getContents();
            $body = json_decode($contents, true);

            $msg = $body['message'] ?? $body['error'] ?? 'Unexpected error occurred while communicating with APIFrame API';
            throw new ApiException($msg);
        }

        return $resp;
    }

    /**
     * Generate images using Midjourney imagine endpoint
     * 
     * @param string $prompt Text prompt for Midjourney AI
     * @param string $mode Can be "fast" or "turbo"
     * @param string|null $aspectRatio Optional aspect ratio (e.g. "16:9", "1:1", "9:16")
     * @return array Response with task_id
     * @throws ApiException
     */
    public function imagine(
        string $prompt,
        string $mode = 'fast',
        ?string $aspectRatio = null
    ): array {
        $body = [
            'prompt' => $prompt,
            'mode' => $mode,
        ];

        // Add aspect ratio if provided
        if ($aspectRatio) {
            $body['aspect_ratio'] = $aspectRatio;
        }

        error_log("APIFrame Client: Sending request body: " . json_encode($body));
        
        $resp = $this->sendRequest('POST', '/pro/imagine', $body);
        $content = $resp->getBody()->getContents();
        
        return json_decode($content, true) ?? [];
    }

    /**
     * Fetch task result/status using fetch endpoint
     * 
     * @param string $taskId The task_id of the task
     * @return array Task result data
     * @throws ApiException
     */
    public function fetch(string $taskId): array
    {
        $body = ['task_id' => $taskId];

        $resp = $this->sendRequest('POST', '/fetch', $body);
        $content = $resp->getBody()->getContents();
        
        return json_decode($content, true) ?? [];
    }

    /**
     * Check if custom API key is configured
     */
    public function hasCustomKey(): bool
    {
        return !empty($this->apiKey);
    }
}
