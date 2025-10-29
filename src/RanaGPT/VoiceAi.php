<?php

namespace RanaGPT;

class VoiceAi 
{
    const VOICES = ["alloy", "coral", "echo", "shimmer", "verse", "onyx"];
    const STYLES = ["friendly", "calm", "noir_detective", "cowboy"];
    
    public function generate($text, $voice = "alloy", $style = null, $method = "GET") {
        if (!in_array($voice, self::VOICES)) {
            return [
                "status" => "Error",
                "error" => "This form '$voice' does not exist. Supported forms: " . implode(", ", self::VOICES)
            ];
        }
        
        if ($style && !in_array($style, self::STYLES)) {
            return [
                "status" => "Error",
                "error" => "This form '$style' does not exist. Supported forms: " . implode(", ", self::STYLES)
            ];
        }
        
        $url = Client::API_BASE_URL . "/Tofey/voice.php";
        $params = ["text" => $text, "voice" => $voice];
        if ($style) $params["style"] = $style;
        
        if (strtoupper($method) === "POST") {
            $response = $this->httpPost($url, $params);
        } else {
            $response = $this->httpGet($url, $params);
        }
        
        $status = strpos($response, "audio_url") !== false ? "ok" : "Bad";
        return [
            "status" => $status,
            "result" => $response,
            "Tofey" => "@qqxqqv"
        ];
    }
    
    public function getVoices() {
        return self::VOICES;
    }
    
    public function getStyles() {
        return self::STYLES;
    }
    
    private function httpGet($url, $params) {
        $query = http_build_query($params);
        return file_get_contents($url . '?' . $query);
    }
    
    private function httpPost($url, $data) {
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}