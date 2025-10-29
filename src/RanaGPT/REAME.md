# RanaGPT PHP SDK

Official PHP SDK for RanaGPT AI services. Multiple AI models, voice generation, image creation, Turkish series, and more.

## 📦 Installation

```bash
composer require ranagpt/php-sdk
```

## 🚀 Quick Start

```php
<?php
require_once 'vendor/autoload.php';

use RanaGPT\Client;

// Text Generation
$response = Client::text()->deepInfra("Hello, how are you?", "deepseekv3");
echo $response['result'];

// Voice Generation  
$voice = Client::voice()->generate("Hello world", "alloy");
echo $voice['result'];

// Image Generation
$image = Client::image()->generate("A beautiful sunset", "RanaGPT-7-i");
print_r($image);

// Turkish Series
$series = Client::turkish()->latestSeries();
print_r($series['result']);

// Download Service
$download = Client::download()->get("https://example.com/video");
print_r($download);
```

## 📚 All Available Services

| Service | Method | Description |
|---------|--------|-------------|
| Voice AI | `Client::voice()` | Voice generation with multiple voices |
| Text AI | `Client::text()` | Multiple AI text models |
| Image AI | `Client::image()` | AI image generation |
| WormGPT | `Client::worm()` | WormGPT services |
| Model31 | `Client::model31()` | Model31 AI models |
| BlackBox | `Client::blackbox()` | BlackBox AI services |
| Chat AI | `Client::chat()` | Chat AI services |
| Azkar API | `Client::azkar()` | Daily Azkar |
| DeepSeek | `Client::deepseek()` | DeepSeek AI integration |
| Gemini | `Client::gemini()` | Gemini AI services |
| SusanGPT | `Client::susan()` | SusanGPT image editing |
| Download | `Client::download()` | File download services |
| Turkish | `Client::turkish()` | Turkish series API |
| VEO3 | `Client::veo3()` | Video generation |
| XnGPT | `Client::xngpt()` | Advanced GPT services |
| Info | `Client::info()` | Social media information |
| TofeyAI | `Client::tofeyAI()` | Tofey AI assistant |
| GPT-OSS | `Client::gptOss()` | Open source GPT |
| ToolEditor | `Client::toolEditor()` | Code editing tool |

## 🔧 Requirements

- PHP 7.4 or higher
- cURL extension
- JSON extension

## 📄 License

MIT License

## 👨‍💻 Developer

Tofey (@qqxqqv)