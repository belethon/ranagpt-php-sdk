<?php

namespace RanaGPT;

class GeminiApi 
{
    public function ask($prompt) {
        try {
            $url = Client::API_BASE_URL . "/Tofey/gemini.php";
            $response = file_get_contents($url . '?' . http_build_query(["text" => $prompt]));
            return json_decode($response, true);
        } catch (\Exception $e) {
            return ["status" => "OK", "result" => ""];
        }
    }
    
    public function getModels() {
        return [];
    }
}