<?php

namespace App\Listeners;

use App\Events\PropertyCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PropertyCreatedEmail;
use Mail;

class SendPropertyCreatedEmail
{
    /**
     * Create the event listener.
     */
    public $property;
    public $owner;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PropertyCreated $event): void
    {
        Mail::to(request()->user()->email)->send(new PropertyCreatedEmail($event->property, $event->owner));
    }
}
