<?php

namespace RanaGPT;

class Info 
{
    private $my_channel = "@T66TD";
    
    public function instagram($username) {
        try {
            $url = "https://zecora0.serv00.net/info.php?ins=" . urlencode($username);
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            
            if (isset($data["dev"])) {
                $data["dev"] = "Dont forget to support the channel " . $this->my_channel;
            }
            return $data;
        } catch (\Exception $e) {
            return ["success" => false, "error" => $e->getMessage()];
        }
    }
    
    public function tiktok($username) {
        try {
            $url = "https://zecora0.serv00.net/info.php?tak=" . urlencode($username);
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            
            if (isset($data["dev"])) {
                $data["dev"] = "Dont forget to support the channel " . $this->my_channel;
            }
            return $data;
        } catch (\Exception $e) {
            return ["success" => false, "error" => $e->getMessage()];
        }
    }
    
    public function youtube($channel) {
        try {
            $url = "https://zecora0.serv00.net/info.php?yt=" . urlencode($channel);
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            
            if (isset($data["dev"])) {
                $data["dev"] = "Dont forget to support the channel " . $this->my_channel;
            }
            return $data;
        } catch (\Exception $e) {
            return ["success" => false, "error" => $e->getMessage()];
        }
    }
    
    public function setChannel($channel) {
        $this->my_channel = $channel;
    }
}