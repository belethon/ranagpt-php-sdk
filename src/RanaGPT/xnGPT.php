<?php

namespace RanaGPT;

class XnGPT 
{
    public function generate($prompt, $links = null) {
        try {
            $api_url = "https://tofey.serv00.net/api/gemini.php";
            $params = ["text" => $prompt];
            if ($links && is_array($links)) {
                $params["links"] = implode(",", array_slice($links, 0, 10));
            }

            $response = file_get_contents($api_url . '?' . http_build_query($params));
            $decoded = json_decode($response, true);
            
            if ($decoded !== null) {
                $result = [];
                if (isset($decoded["url"])) {
                    $result["image"] = $decoded["url"];
                } else {
                    $result = $decoded;
                }
                return ["success" => true, "result" => $result];
            }

            return ["success" => false, "message" => $response];
        } catch (\Exception $e) {
            return ["success" => false, "error" => $e->getMessage()];
        }
    }
    
    public function editImage($imageUrl, $prompt) {
        try {
            $api_url = "https://tofey.serv00.net/api/gemini.php";
            $data = [
                "image" => $imageUrl,
                "text" => $prompt
            ];

            $response = $this->httpPostJson($api_url, $data);
            $decoded = json_decode($response, true);
            
            if ($decoded !== null) {
                $result = [];
                if (isset($decoded["url"])) {
                    $result["image"] = $decoded["url"];
                } else {
                    $result = $decoded;
                }
                return ["success" => true, "result" => $result];
            }

            return ["success" => false, "message" => $response];
        } catch (\Exception $e) {
            return ["success" => false, "error" => $e->getMessage()];
        }
    }
    
    private function httpPostJson($url, $data) {
        $options = [
            'http' => [
                'header' => "Content-type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data),
                'timeout' => 10000
            ]
        ];
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}