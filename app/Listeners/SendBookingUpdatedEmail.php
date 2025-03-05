<?php

namespace App\Listeners;

use App\Events\BookingUpdated;
use App\Mail\BookingUpdateConfirmation;
use Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBookingUpdatedEmail
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
        Mail::to($event->customer)->send(new BookingUpdateConfirmation($event->booking, $event->oldBooking, $event->customer));
    }
}
