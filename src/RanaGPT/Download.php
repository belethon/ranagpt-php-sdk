<?php

namespace RanaGPT;

class Download 
{
    public function get($url) {
        try {
            $api_url = Client::API_BASE_URL . "/api/do.php";
            $response = file_get_contents($api_url . '?' . http_build_query(["url" => $url]));
            $data = json_decode($response, true);

            if (isset($data["links"])) {
                return [
                    "status" => "OK",
                    "title" => $data["title"] ?? "",
                    "date" => $data["date"] ?? "",
                    "links" => $data["links"],
                    "dev" => $data["dev"] ?? ""
                ];
            } else {
                return ["status" => "Bad", "result" => $data];
            }
        } catch (\Exception $e) {
            return ["status" => "Error", "message" => $e->getMessage()];
        }
    }
}