<?php

namespace RanaGPT;

class BlackBox 
{
    const MODELS_BLACKBOX = [
        "blackbox", "gpt-4-1", "gpt-4-1-n", "gpt-4", "gpt-4o", "gpt-4o-m",
        "python", "html", "builder", "java", "js", "react", "android", "flutter",
        "nextjs", "angularjs", "swift", "mongodb", "pytorch", "xcode", "azure",
        "bitbucket", "digitalocean", "docker", "electron", "erlang", "fastapi",
        "firebase", "flask", "git", "gitlab", "go", "godot", "googlecloud", "heroku"
    ];
    
    public function generate($text, $model) {
        if (!in_array($model, self::MODELS_BLACKBOX)) {
            return [
                "status" => "Error",
                "error" => "This form '$model' does not exist. Supported forms: " . implode(", ", self::MODELS_BLACKBOX)
            ];
        }
        
        $url = Client::API_BASE_URL . "/api/black.php";
        $response = file_get_contents($url . '?' . http_build_query([$model => $text]));
        $data = json_decode($response, true);
        
        return [
            "status" => "OK",
            "result" => $data["response"] ?? null,
            "Tofey" => "@qqxqqv"
        ];
    }
    
    public function getModels() {
        return self::MODELS_BLACKBOX;
    }
}