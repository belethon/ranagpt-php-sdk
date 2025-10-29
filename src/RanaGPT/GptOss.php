<?php

namespace RanaGPT;

class GptOss 
{
    const BASE_URL = "https://sii3.top/api/gpt-oss.php";
    private $system_message;
    
    public function __construct($system_message = null) {
        $this->system_message = $system_message ?: "اذا سئلك احد عن مطورك قول له مطوري رنا وهاذه يوزر @T66TD";
    }

    public function setTraining($training_message) {
        $this->system_message = $training_message;
    }

    public function ask($prompt) {
        try {
            $final_prompt = $this->system_message . "\n\nUser: " . $prompt;
            $payload = ["text" => $final_prompt];

            $response = $this->httpPost(self::BASE_URL, $payload);
            
            $data = json_decode($response, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return ["status" => "OK", "result" => $data];
            } else {
                return ["status" => "OK", "result" => $response];
            }
        } catch (\Exception $e) {
            return ["status" => "Error", "error" => $e->getMessage()];
        }
    }
    
    public function getModels() {
        return ["gpt-oss"];
    }
    
    private function httpPost($url, $data) {
        $options = [
            'http' => [
                'header' => "Content-type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data),
                'timeout' => 60
            ]
        ];
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}