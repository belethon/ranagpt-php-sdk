<?php

namespace RanaGPT;

class Model31 
{
    const MODELS_31 = [
        "grok", "grok-2", "grok-2-1212", "grok-2-mini", "openai", "evil",
        "gpt-4o-mini", "gpt-4-1-nano", "gpt-4", "gpt-4o", "gpt-4-1", "gpt-4-1-mini",
        "o4-mini", "command-r-plus", "gemini-2-5-flash", "gemini-2-0-flash-thinking",
        "qwen-2-5-coder-32b", "llama-3-3-70b", "llama-4-scout", "llama-4-scout-17b",
        "mistral-small-3-1-24b", "deepseek-r1", "deepseek-r1-distill-llama-70b",
        "deepseek-r1-distill-qwen-32b", "phi-4", "qwq-32b", "deepseek-v3",
        "deepseek-v3-0324", "openai-large", "openai-reasoning", "searchgpt"
    ];
    
    public function generate($text, $model) {
        if (!in_array($model, self::MODELS_31)) {
            return [
                "status" => "Error",
                "error" => "This form '$model' does not exist. Supported forms: " . implode(", ", self::MODELS_31)
            ];
        }
        
        $url = Client::API_BASE_URL . "/api/gpt.php";
        $response = file_get_contents($url . '?' . http_build_query([$model => $text]));
        return json_decode($response, true);
    }
    
    public function getModels() {
        return self::MODELS_31;
    }
}