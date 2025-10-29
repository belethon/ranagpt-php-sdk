<?php

namespace RanaGPT;

class Turkish 
{
    const BASE_URL = "https://api.dfkz.xo.je/Turkish";
    
    public function latestSeries($page = 1) {
        try {
            $url = self::BASE_URL . "/";
            if ($page != 1) {
                $url .= "?page=" . $page;
            }
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            return ["status" => "OK", "result" => $data, "Tofey" => "@qqxqqv"];
        } catch (\Exception $e) {
            return ["status" => "Error", "error" => $e->getMessage(), "Tofey" => "@qqxqqv"];
        }
    }
    
    public function episodeServers($episodeId) {
        try {
            $url = self::BASE_URL . "/ep.php";
            $response = file_get_contents($url . '?' . http_build_query(["id" => $episodeId]));
            $data = json_decode($response, true);
            
            if (is_array($data) && isset($data["error"])) {
                return ["status" => "Bad", "error" => $data["error"], "Tofey" => "@qqxqqv"];
            }
            return ["status" => "OK", "result" => $data, "Tofey" => "@qqxqqv"];
        } catch (\Exception $e) {
            $errorMsg = $e->getMessage();
            if (strpos($errorMsg, "500") !== false) {
                return [
                    "status" => "Error",
                    "error" => "الخادم أعاد خطأ داخلي (500). تأكد من صحة الـ ID.",
                    "Tofey" => "@qqxqqv"
                ];
            }
            return ["status" => "Error", "error" => $errorMsg, "Tofey" => "@qqxqqv"];
        }
    }
    
    public function episodeServersEpid($episodeId) {
        try {
            $url = self::BASE_URL . "/epid.php";
            $response = file_get_contents($url . '?' . http_build_query(["id" => $episodeId]));
            $data = json_decode($response, true);
            
            if (is_array($data) && isset($data["error"])) {
                return ["status" => "Bad", "error" => $data["error"], "Tofey" => "@qqxqqv"];
            }
            return ["status" => "OK", "result" => $data, "Tofey" => "@qqxqqv"];
        } catch (\Exception $e) {
            return ["status" => "Error", "error" => $e->getMessage(), "Tofey" => "@qqxqqv"];
        }
    }
    
    public function latestEpisodes($page = 1) {
        try {
            $url = self::BASE_URL . "/lastep.php";
            if ($page != 1) {
                $url .= "?page=" . $page;
            }
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            return ["status" => "OK", "result" => $data, "Tofey" => "@qqxqqv"];
        } catch (\Exception $e) {
            return ["status" => "Error", "error" => $e->getMessage(), "Tofey" => "@qqxqqv"];
        }
    }
    
    public function search($query, $page = 1) {
        try {
            $url = self::BASE_URL . "/search.php";
            $params = ["q" => $query];
            if ($page != 1) {
                $params["page"] = $page;
            }
            $response = file_get_contents($url . '?' . http_build_query($params));
            $data = json_decode($response, true);
            return ["status" => "OK", "result" => $data, "Tofey" => "@qqxqqv"];
        } catch (\Exception $e) {
            return ["status" => "Error", "error" => $e->getMessage(), "Tofey" => "@qqxqqv"];
        }
    }
}