<?php

namespace App\Services;

use App\Models\Url;
use App\Models\UrlFailure;
use App\Models\User;
use App\Notifications\UrlFailedNotification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class UrlChecker {
    public function checkUrlStatus (Url $url) {
        $startTime = microtime(true);
    
        $response = Http::get($url->url);
    
        $totalTime = microtime(true) - $startTime;

        logger($totalTime);

        if (!$response->ok() && $url->failing == false) {
            $this->notifyOnError($url);

            UrlFailure::create([
                'url_id' => $url->id
            ]);

            $url->failing = true;
            $url->save();

            return false;
        }

        return $response->ok();
    }

    public function notifyOnError (Url $url) {
        $user = User::find(1);

        Notification::send($user, new UrlFailedNotification($url));
    }
}