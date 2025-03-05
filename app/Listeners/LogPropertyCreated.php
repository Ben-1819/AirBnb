<?php

namespace App\Listeners;

use App\Events\PropertyCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogPropertyCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PropertyCreated $event): void
    {
        log::info("New property successfully made!");
    }
}
