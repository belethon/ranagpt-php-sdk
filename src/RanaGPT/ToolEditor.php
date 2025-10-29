<?php

namespace RanaGPT;

class ToolEditor 
{
    private $device_id = '52CAB9370AEBB1ED';
    private $application_id = 'com.smartwidgetlabs.chatgpt';
    private $auth_token_static = 'Lhee9Yb9VhLLV/vAZsOdKSRc7/m9Jc2IlEV0nnPLEMh+AnkGsk9p6QnTO2zqSs0mTxNW4SMZvQWQff2Nyu4/it7qHZU7i7MSRaXhXe30ZnFxGMwInrxQnWHjIkfKhN0yEJZiwOaUXyVAJaZ6quroAS6Kvycz6OeXYG0u3AM7/9g=';
    private $access_token = null;
    private $system_message = "انت محرر أدوات، وظيفتك تعدل الأكواد حسب المطلوب اعمل حسب طلب بدون اضافه اي كلام زائد فقط قم باضافه الكود";

    private function getAccessToken() {
        $payload = [
            'device_id' => $this->device_id,
            'order_id' => '', 'product_id' => '', 'purchase_token' => '', 'subscription_id' => '',
        ];
        
        $response = $this->httpPost("https://api.vulcanlabs.co/smith-auth/api/v1/token", $payload, [
            "Host: api.vulcanlabs.co",
            "X-Vulcan-Application-Id: " . $this->application_id,
            "Accept: application/json",
            "User-Agent: Chat Smith Android, Version 3.9.27(949)",
            "Content-Type: application/json; charset=utf-8"
        ]);
        
        $data = json_decode($response, true);
        if (isset($data["AccessToken"])) {
            $this->access_token = $data["AccessToken"];
        } else {
            throw new \Exception("⚠️ فشل في الحصول على AccessToken");
        }
    }

    public function setTraining($msg) {
        $this->system_message = $msg;
    }

    public function ask($file_path, $prompt) {
        if (!$this->access_token) {
            $this->getAccessToken();
        }

        // قراءة الكود الحالي
        $current_code = file_get_contents($file_path);

        $payload = [
            'usage_model' => ['provider' => 'openai', 'model' => 'gpt-4o'],
            'user' => $this->device_id,
            'messages' => [
                ['role' => 'system', 'content' => $this->system_message],
                ['role' => 'user', 'content' => "عدّل الكود التالي:\n{$current_code}\n\nالتعليمات: {$prompt}"]
            ],
            'nsfw_check' => true,
        ];

        $response = $this->httpPost("https://api.vulcanlabs.co/smith-v2/api/v7/chat_android", $payload, [
            "Host: api.vulcanlabs.co",
            "Authorization: Bearer " . $this->access_token,
            "X-Auth-Token: " . $this->auth_token_static,
            "X-Vulcan-Application-Id: " . $this->application_id,
            "Accept: application/json",
            "User-Agent: Chat Smith Android, Version 3.9.27(949)",
            "Content-Type: application/json; charset=utf-8"
        ]);
        
        $data = json_decode($response, true);
        if (isset($data["choices"]) && count($data["choices"]) > 0) {
            $raw_code = $data["choices"][0]["Message"]["content"];
            $clean_code = $this->cleanCode($raw_code);
            
            // كتابة الكود المعدل
            file_put_contents($file_path, $clean_code);
            
            return "✅ تم تعديل الأداة {$file_path}\n\nالكود المعدل:\n{$clean_code}";
        } else {
            throw new \Exception("⚠️ ما اجاني رد من السيرفر");
        }
    }
    
    private function cleanCode($text) {
        // تنظيف الكود من الرموز الزائدة
        $text = preg_replace('/```.*?```/s', '', $text);
        return trim($text);
    }
    
    private function httpPost($url, $data, $headers) {
        $options = [
            'http' => [
                'header' => implode("\r\n", $headers),
                'method' => 'POST',
                'content' => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}