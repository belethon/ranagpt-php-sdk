<?php

namespace RanaGPT;

class DeepSeekT1 
{
    public function codeify($text) {
        $url = Client::API_BASE_URL . "/api/DeepSeek/DeepSeek.php";
        $response = file_get_contents($url . '?' . http_build_query(["text" => $text]));
        
        $data = json_decode($response, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            if (is_array($data)) {
                if (isset($data["result"])) return ["status" => "OK", "result" => $data["result"]];
                if (isset($data["response"])) return ["status" => "OK", "result" => $data["response"]];
                return ["status" => "OK", "result" => json_encode($data)];
            }
        }
        
        return ["status" => "OK", "result" => $response];
    }
    
    public function getModels() {
        return [];
    }
}