<?php

namespace RanaGPT;

class SusanGPT 
{
    public function edit($text, $imageUrl) {
        try {
            $api = "https://api.dfkz.xo.je/apis/v2/gemini-img.php";
            $payload = ["text" => $text, "link" => $imageUrl];
            
            $response = $this->httpPost($api, $payload);
            $data = json_decode($response, true);
            
            if (isset($data["image"])) {
                return ["status" => "OK", "result" => $data["image"]];
            } elseif (isset($data["url"])) {
                return ["status" => "OK", "result" => $data["url"]];
            } else {
                return ["status" => "OK", "result" => $data];
            }
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