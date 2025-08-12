# Runway API Plugin for Aikeedo

Advanced AI video and image generation plugin integrating [Runway API](https://docs.dev.runwayml.com/) with Aikeedo platform.

## Features

### 🎨 **Image Generation**
- **Gen4 Image**: Advanced image generation with reference image support
- Style transfer capabilities using reference images
- Multiple aspect ratios support (16:9, 9:16, 1:1, etc.)
- High-quality output with automatic optimization

### 🎬 **Video Generation**
- **Gen4 Turbo**: Fast video generation with good quality
- **Gen4 Aleph**: Highest quality video generation model
- Text-to-video and image-to-video generation
- Configurable video duration (5-10 seconds)
- Real-time progress tracking

### 🔧 **Technical Features**
- Async processing with webhook notifications
- Automatic cost calculation and credit deduction
- Secure API key management
- CDN integration for file storage
- Error handling and retry mechanisms

## Installation

1. Place the plugin in `extra/extensions/heyaikeedo/runway/`
2. Ensure all dependencies are installed via Composer
3. Activate the plugin through Aikeedo admin panel
4. Configure your Runway API key in settings

## Configuration

### API Key Setup
1. Visit [Runway Developer Portal](https://docs.dev.runwayml.com/)
2. Create an account and generate an API key
3. Navigate to Settings → Providers → Runway API in Aikeedo
4. Enter your API key and save settings

### Model Configuration
Enable/disable specific models in the admin panel:
- **Gen4 Image**: For image generation tasks
- **Gen4 Turbo**: For fast video generation
- **Gen4 Aleph**: For high-quality video generation

## Usage

### Image Generation
```php
// Example parameters for image generation
$params = [
    'prompt' => 'A beautiful sunset over mountains',
    'ratio' => '1920:1080',
    'images' => [...] // Optional reference images
];
```

### Video Generation
```php
// Example parameters for video generation
$params = [
    'prompt' => 'A flowing river through a forest',
    'ratio' => '1920:1080',
    'duration' => '5',
    'images' => [...] // Optional reference image for image-to-video
];
```

## Architecture

### Service Classes
- `Client`: HTTP client for Runway API communication
- `ImageGeneratorService`: Implements image generation interface
- `VideoService`: Implements video generation interface
- `Helper`: Utility functions for webhook URLs and common operations

### Webhook Processing
- `WebhookRequestHandler`: Handles incoming webhook notifications
- `ImageWebhookProcessor`: Processes image generation completions
- `VideoWebhookProcessor`: Processes video generation completions

### Configuration
- `Plugin`: Main plugin class handling registration and bootstrapping
- `SettingsRequestHandler`: Admin settings page controller

## API Integration

This plugin follows Runway API specifications:

### Endpoints Used
- `POST /v1/images/generations` - Image generation
- `POST /v1/videos/generations` - Video generation

### Webhook Support
- Automatic webhook registration for async processing
- Status tracking: PENDING → RUNNING → SUCCEEDED/FAILED
- Progress updates for video generation

## Security

- API keys are securely stored and never logged
- Webhook payloads are validated for authenticity
- Reference images are uploaded to secure CDN storage
- All API communication uses HTTPS

## Pricing Integration

- Automatic cost calculation based on model usage
- Credit deduction from workspace balance
- Support for different pricing tiers
- Failed generations don't consume credits

## Error Handling

- Comprehensive error messages for API failures
- Retry mechanisms for transient failures
- Graceful degradation when API is unavailable
- Detailed logging for debugging

## Requirements

- PHP 8.1+
- Aikeedo Core Platform
- Active Runway API subscription
- CDN storage for file management

## Support

For issues and support:
- Check [Runway API Documentation](https://docs.dev.runwayml.com/)
- Contact Aikeedo support team
- Review plugin logs for debugging

## License

MIT License - See LICENSE file for details.
