<?php

namespace App\Listeners;

use App\Events\PropertyCreated;
use Notification;
use App\Models\User;
use App\Notifications\PropertyCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPropertyCreatedNotification
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
        $admin = User::role("superadmin")->get();
        Notification::send($admin, new PropertyCreatedNotification($event->property));
    }
}
