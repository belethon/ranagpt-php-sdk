<?php

namespace RanaGPT;

class WormGpt 
{
    public function darkGPT($text) {
        $url = Client::API_BASE_URL . "/Tofey/api2/Darkgpt.php";
        $response = file_get_contents($url . '?' . http_build_query(["text" => $text]));
        $data = json_decode($response, true);
        
        return [
            "status" => "OK",
            "result" => $data["response"] ?? null,
            "Tofey" => "@qqxqqv"
        ];
    }
    
    public function worm($text) {
        $url = Client::API_BASE_URL . "/Tofey/api/wormgpt.php";
        $response = file_get_contents($url . '?' . http_build_query(["text" => $text]));
        $data = json_decode($response, true);
        
        return [
            "status" => "OK",
            "result" => $data["response"] ?? null,
            "Tofey" => "@qqxqqv"
        ];
    }
    
    public function getModels() {
        return [];
    }
}