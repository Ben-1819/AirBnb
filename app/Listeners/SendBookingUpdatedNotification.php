<?php

namespace App\Listeners;

use App\Events\BookingUpdated;
use App\Notifications\BookingUpdatedNotification;
use Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBookingUpdatedNotification
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
        Notification::send($event->owner, new BookingUpdatedNotification($event->booking, $event->oldBooking, $event->customer, $event->property, $event->owner));
    }
}
