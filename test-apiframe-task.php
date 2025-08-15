<?php

// Quick test script to check APIFrame task status
require_once __DIR__ . '/vendor/autoload.php';

use Aikeedo\ApiFrame\Client;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Client\ClientInterface;

// Manually test the task
$taskId = '1dec7173-3311-4888-9cf7-f5628474b08a';
$apiKey = 'your-api-key-here'; // You need to put your actual API key

// Simple HTTP client test
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.apiframe.pro/fetch');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['task_id' => $taskId]));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: ' . $apiKey,
    'Accept: application/json'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $httpCode\n";
echo "Response: $response\n";

if ($response) {
    $data = json_decode($response, true);
    if ($data) {
        echo "Status: " . ($data['status'] ?? 'unknown') . "\n";
        if (isset($data['percentage'])) {
            echo "Progress: " . $data['percentage'] . "%\n";
        }
        if (isset($data['image_urls'])) {
            echo "Image URLs found: " . count($data['image_urls']) . "\n";
        }
    }
}