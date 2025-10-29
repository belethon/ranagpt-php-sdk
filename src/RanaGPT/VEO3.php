<?php

namespace RanaGPT;

class VEO3 
{
    public function generate($prompt, $imageUrl) {
        $api_url = "https://tofey.serv00.net/api/veo3.php";

        try {
            // تجربة POST أولاً
            $postResponse = $this->httpPost($api_url, [
                "text" => $prompt,
                "link" => $imageUrl
            ]);
            
            if (!empty($postResponse)) {
                $data = json_decode($postResponse, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    if (isset($data["video"])) return ["status" => "OK", "result" => $data["video"]];
                    if (isset($data["url"])) return ["status" => "OK", "result" => $data["url"]];
                    if (isset($data["image"])) return ["status" => "OK", "result" => $data["image"]];
                }
            }

            // تجربة GET
            $getResponse = file_get_contents($api_url . '?' . http_build_query([
                "text" => $prompt,
                "link" => $imageUrl
            ]));
            
            if (!empty($getResponse)) {
                $data = json_decode($getResponse, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    if (isset($data["video"])) return ["status" => "OK", "result" => $data["video"]];
                    if (isset($data["url"])) return ["status" => "OK", "result" => $data["url"]];
                    if (isset($data["image"])) return ["status" => "OK", "result" => $data["image"]];
                }
                return ["status" => "Error", "message" => "Server returned invalid JSON"];
            }

            return ["status" => "Error", "message" => "No valid response from server"];
        } catch (\Exception $e) {
            return ["status" => "Error", "message" => $e->getMessage()];
        }
    }
    
    private function httpPost($url, $data) {
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
                'timeout' => 1000
            ]
        ];
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}