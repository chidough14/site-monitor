<?php

namespace App\Listeners;

use App\Events\CheckSite;
use App\Services\UrlChecker;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckSiteListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private UrlChecker $urlChecker)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CheckSite $event)
    {
        logger($event->url);

        $this->urlChecker->checkUrlStatus($event->url);
    }
}
