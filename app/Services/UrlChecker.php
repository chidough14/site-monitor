<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UrlChecker {
    public function checkUrlStatus (string $url) {
        $startTime = microtime(true);
    
        $response = Http::get($url);
    
        $totalTime = microtime(true) - $startTime;

        logger($totalTime);

        return $response->ok();
    }
}