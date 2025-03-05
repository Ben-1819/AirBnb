<?php

namespace App\Listeners;

use App\Events\BookingUpdated;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogBookingUpdated
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
    public function handle(BookingUpdated $event): void
    {
        log::info("Booking updated");
    }
}
