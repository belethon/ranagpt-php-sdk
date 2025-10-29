<?php
require_once __DIR__ . '/../vendor/autoload.php';

use RanaGPT\Client;

echo "🚀 RanaGPT PHP SDK - Complete Usage Examples\n\n";

// 1. Voice AI Example
echo "1. 🎤 Voice AI:\n";
$voice = Client::voice()->generate("Hello world", "alloy");
echo "Status: " . $voice['status'] . "\n\n";

// 2. Text AI Example  
echo "2. 🤖 Text AI:\n";
$text = Client::text()->deepInfra("What is PHP?", "deepseekv3");
echo "Response: " . ($text['result'] ?? 'No result') . "\n\n";

// 3. Image AI Example
echo "3. 🖼️ Image AI:\n";
$image = Client::image()->generate("A beautiful sunset", "RanaGPT-7-i");
echo "Image Result: " . print_r($image, true) . "\n\n";

// 4. Turkish Series Example
echo "4. 📺 Turkish Series:\n";
$series = Client::turkish()->latestSeries(1);
echo "Latest Series Count: " . count($series['result'] ?? []) . "\n\n";

// 5. Download Service Example
echo "5. 📥 Download Service:\n";
$download = Client::download()->get("https://example.com/video");
echo "Download Status: " . $download['status'] . "\n\n";

// 6. Social Media Info Example
echo "6. 📱 Social Media Info:\n";
$instagram = Client::info()->instagram("username");
echo "Instagram Data: " . print_r($instagram, true) . "\n\n";

// 7. Available Services
echo "7. 📊 Available Services:\n";
$services = Client::getAvailableServices();
foreach ($services as $key => $description) {
    echo " - {$key}: {$description}\n";
}

echo "\n🎉 All services are ready to use!\n";