<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\UrlFailedNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class UrlChecker {
    public function checkUrlStatus (string $url) {
        $startTime = microtime(true);
    
        $response = Http::get($url);
    
        $totalTime = microtime(true) - $startTime;

        logger($totalTime);

        if (!$response->ok()) {
            $this->notifyOnError($url);

            return false;
        }

        return $response->ok();
    }

    public function notifyOnError (string $url) {
        $user = User::find(1);

        Notification::send($user, new UrlFailedNotification($url));
    }
}