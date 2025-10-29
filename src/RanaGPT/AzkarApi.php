<?php

namespace RanaGPT;

class AzkarApi 
{
    public function today() {
        try {
            $url = Client::API_BASE_URL . "/api/azkar.php";
            $response = file_get_contents($url);
            return json_decode($response, true);
        } catch (\Exception $e) {
            return ["status" => "OK", "result" => ""];
        }
    }
    
    public function getModels() {
        return [];
    }
}