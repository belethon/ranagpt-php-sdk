<?php

namespace RanaGPT;

class TextAi 
{
    const MODELS_DEEP_INFRA = [
        "deepseekv3", "innova", "aicode", "Image4o", "deepseekv3x", "deepseekr1", 
        "deepseekr1base", "deepseekr1turbo", "deepseekr1llama", "deepseekr1qwen",
        "deepseekprover", "qwen235", "qwen30", "qwen32", "qwen14", "mav", "scout",
        "phi-plus", "guard", "qwq", "gemma27", "gemma12", "llama31", "llama332",
        "llama337", "mixtral24", "phi4", "phi-multi", "wizard822", "wizard27",
        "qwen2572", "qwen272", "dolphin26", "dolphin29", "airo70", "lzlv70", "mixtral822"
    ];
    
    public function deepInfra($text, $model) {
        if (!in_array($model, self::MODELS_DEEP_INFRA)) {
            return [
                "status" => "Error",
                "error" => "This form '$model' does not exist. Supported forms: " . implode(", ", self::MODELS_DEEP_INFRA)
            ];
        }
        
        try {
            $url = Client::API_BASE_URL . "/api/DeepInfra.php";
            $response = file_get_contents($url . '?' . http_build_query([$model => $text]));
            $data = json_decode($response, true);
            
            if (isset($data["response"])) {
                return [
                    "status" => "OK", 
                    "result" => $data["response"],
                    "Tofey" => "@qqxqqv"
                ];
            } else {
                return [
                    "status" => "Bad",
                    "result" => $data,
                    "Tofey" => "@qqxqqv"
                ];
            }
        } catch (\Exception $e) {
            return [
                "status" => "Error",
                "error" => $e->getMessage(),
                "Tofey" => "@qqxqqv"
            ];
        }
    }
    
    public function getModels() {
        return self::MODELS_DEEP_INFRA;
    }
}