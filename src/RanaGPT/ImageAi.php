<?php

namespace RanaGPT;

class ImageAi 
{
    const SUPPORTED_MODELS = [
        "fluex-pro", "flux", "schnell", "imger-12", "deepseek",
        "gemini-2-5-pro", "blackbox", "redux", "RanaGPT-7-i",
        "r1", "gpt-4-1"
    ];
    
    public function generate($prompt, $model = "RanaGPT-7-i") {
        if (!in_array($model, self::SUPPORTED_MODELS)) {
            return [
                "status" => "Error",
                "error" => "This form '$model' does not exist. Supported forms: " . implode(", ", self::SUPPORTED_MODELS)
            ];
        }
        
        $url = Client::API_BASE_URL . "/api/img.php";
        $response = file_get_contents($url . '?' . http_build_query([$model => $prompt]));
        
        $data = json_decode($response, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $data;
        } else {
            return [
                "status" => "OK",
                "result" => $response
            ];
        }
    }
    
    public function getModels() {
        return self::SUPPORTED_MODELS;
    }
}