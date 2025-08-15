<?php

// Simple APIFrame task checker (no DB required)
header('Content-Type: application/json');

$taskId = $_GET['task_id'] ?? '1dec7173-3311-4888-9cf7-f5628474b08a';
$apiKey = 'sk-XZRKGhNwMOzlCfDHBAk0NvBHkIJJpYHNpfEfLbXQqHhYXhCa'; // Replace with actual key

// Check task status via APIFrame API
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

if ($response) {
    $data = json_decode($response, true);
    echo json_encode([
        'success' => true,
        'http_code' => $httpCode,
        'task_id' => $taskId,
        'status' => $data['status'] ?? 'unknown',
        'progress' => $data['percentage'] ?? 0,
        'image_urls' => $data['image_urls'] ?? [],
        'original_image_url' => $data['original_image_url'] ?? null,
        'raw_response' => $data
    ], JSON_PRETTY_PRINT);
} else {
    echo json_encode([
        'success' => false,
        'error' => 'No response from APIFrame API',
        'http_code' => $httpCode
    ], JSON_PRETTY_PRINT);
}