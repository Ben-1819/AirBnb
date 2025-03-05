<?php

namespace App\Listeners;

use App\Events\PropertyUpdated;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogPropertyUpdated
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
    public function handle(PropertyUpdated $event): void
    {
        log::info("Property has been updated");
    }
}
