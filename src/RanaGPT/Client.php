<?php

namespace RanaGPT;

/**
 * RanaGPT PHP SDK - Main Client Class
 * 
 * @package RanaGPT
 * @author Tofey
 * @version 1.0.0
 * @license MIT
 */
class Client
{
    const API_BASE_URL = "http://sii3.moayman.top";
    const SDK_VERSION = "1.0.0";
    
    private static $instances = [];
    
    /**
     * Voice AI Services
     */
    public static function voice() {
        if (!isset(self::$instances['voice'])) {
            self::$instances['voice'] = new VoiceAi();
        }
        return self::$instances['voice'];
    }
    
    /**
     * Text AI Services
     */
    public static function text() {
        if (!isset(self::$instances['text'])) {
            self::$instances['text'] = new TextAi();
        }
        return self::$instances['text'];
    }
    
    /**
     * Image AI Services
     */
    public static function image() {
        if (!isset(self::$instances['image'])) {
            self::$instances['image'] = new ImageAi();
        }
        return self::$instances['image'];
    }
    
    /**
     * WormGPT Services
     */
    public static function worm() {
        if (!isset(self::$instances['worm'])) {
            self::$instances['worm'] = new WormGpt();
        }
        return self::$instances['worm'];
    }
    
    /**
     * Model31 Services
     */
    public static function model31() {
        if (!isset(self::$instances['model31'])) {
            self::$instances['model31'] = new Model31();
        }
        return self::$instances['model31'];
    }
    
    /**
     * BlackBox AI Services
     */
    public static function blackbox() {
        if (!isset(self::$instances['blackbox'])) {
            self::$instances['blackbox'] = new BlackBox();
        }
        return self::$instances['blackbox'];
    }
    
    /**
     * Developers Information
     */
    public static function developers() {
        if (!isset(self::$instances['developers'])) {
            self::$instances['developers'] = new Developers();
        }
        return self::$instances['developers'];
    }
    
    /**
     * Chat AI Services
     */
    public static function chat() {
        if (!isset(self::$instances['chat'])) {
            self::$instances['chat'] = new ChatAi();
        }
        return self::$instances['chat'];
    }
    
    /**
     * Azkar API Services
     */
    public static function azkar() {
        if (!isset(self::$instances['azkar'])) {
            self::$instances['azkar'] = new AzkarApi();
        }
        return self::$instances['azkar'];
    }
    
    /**
     * DeepSeek AI Services
     */
    public static function deepseek() {
        if (!isset(self::$instances['deepseek'])) {
            self::$instances['deepseek'] = new DeepSeekT1();
        }
        return self::$instances['deepseek'];
    }
    
    /**
     * Gemini AI Services
     */
    public static function gemini() {
        if (!isset(self::$instances['gemini'])) {
            self::$instances['gemini'] = new GeminiApi();
        }
        return self::$instances['gemini'];
    }
    
    /**
     * SusanGPT Services
     */
    public static function susan() {
        if (!isset(self::$instances['susan'])) {
            self::$instances['susan'] = new SusanGPT();
        }
        return self::$instances['susan'];
    }
    
    /**
     * Download Services
     */
    public static function download() {
        if (!isset(self::$instances['download'])) {
            self::$instances['download'] = new Download();
        }
        return self::$instances['download'];
    }
    
    /**
     * Turkish Series Services
     */
    public static function turkish() {
        if (!isset(self::$instances['turkish'])) {
            self::$instances['turkish'] = new Turkish();
        }
        return self::$instances['turkish'];
    }
    
    /**
     * VEO3 Video Services
     */
    public static function veo3() {
        if (!isset(self::$instances['veo3'])) {
            self::$instances['veo3'] = new VEO3();
        }
        return self::$instances['veo3'];
    }
    
    /**
     * XnGPT Services
     */
    public static function xngpt() {
        if (!isset(self::$instances['xngpt'])) {
            self::$instances['xngpt'] = new XnGPT();
        }
        return self::$instances['xngpt'];
    }
    
    /**
     * Social Media Info Services
     */
    public static function info() {
        if (!isset(self::$instances['info'])) {
            self::$instances['info'] = new Info();
        }
        return self::$instances['info'];
    }
    
    /**
     * Tofey AI Services
     */
    public static function tofeyAI() {
        if (!isset(self::$instances['tofeyAI'])) {
            self::$instances['tofeyAI'] = new TofeyAI();
        }
        return self::$instances['tofeyAI'];
    }
    
    /**
     * GPT-OSS Services
     */
    public static function gptOss() {
        if (!isset(self::$instances['gptOss'])) {
            self::$instances['gptOss'] = new GptOss();
        }
        return self::$instances['gptOss'];
    }
    
    /**
     * Tool Editor Services
     */
    public static function toolEditor() {
        if (!isset(self::$instances['toolEditor'])) {
            self::$instances['toolEditor'] = new ToolEditor();
        }
        return self::$instances['toolEditor'];
    }
    
    /**
     * Get SDK Version
     */
    public static function version() {
        return self::SDK_VERSION;
    }
    
    /**
     * Get API Base URL
     */
    public static function getBaseUrl() {
        return self::API_BASE_URL;
    }
    
    /**
     * Helper function for innova
     */
    public static function innova($prompt) {
        $url = "https://tofey.serv00.net/api/chatgpt3.5.php";
        $response = file_get_contents($url . '?' . http_build_query(["text" => $prompt]));
        $data = json_decode($response, true);
        return $data["response"] ?? "No response found.";
    }
    
    /**
     * Helper function for aicode
     */
    public static function aicode($prompt) {
        $url = "https://tofey.serv00.net/api/aicode.php";
        $response = file_get_contents($url . '?' . http_build_query(["text" => $prompt]));
        return $response;
    }
    
    /**
     * Get all available services
     */
    public static function getAvailableServices() {
        return [
            'voice' => 'Voice AI Generation',
            'text' => 'Text AI Models', 
            'image' => 'Image AI Generation',
            'worm' => 'WormGPT Services',
            'model31' => 'Model31 AI',
            'blackbox' => 'BlackBox AI',
            'developers' => 'Developer Information',
            'chat' => 'Chat AI',
            'azkar' => 'Azkar API',
            'deepseek' => 'DeepSeek AI',
            'gemini' => 'Gemini AI',
            'susan' => 'SusanGPT',
            'download' => 'Download Services',
            'turkish' => 'Turkish Series',
            'veo3' => 'VEO3 Video',
            'xngpt' => 'XnGPT',
            'info' => 'Social Media Info',
            'tofeyAI' => 'Tofey AI',
            'gptOss' => 'GPT OSS',
            'toolEditor' => 'Code Tool Editor'
        ];
    }
}