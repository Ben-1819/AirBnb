<?php

namespace App\Listeners;

use App\Events\PropertyUpdated;
use App\Mail\PropertyUpdatedEmail;
use Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPropertyUpdatedEmail
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
        Mail::to($event->owner->email)->send(new PropertyUpdatedEmail($event->property, $event->oldProperty, $event->owner));
    }
}
