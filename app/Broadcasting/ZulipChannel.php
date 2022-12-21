<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Notifications\Notification;

class ZulipChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
    }

    public function send($notifiable, Notification $notification)
    {
        //$message = $notification->toVoice($notifiable);
 
        // Send notification to the $notifiable instance...
        logger($notifiable);
    }
}
