<?php

namespace App\Listeners;

use App\Events\PropertyUpdated;
use App\Models\User;
use App\Notifications\PropertyUpdatedNotification;
use Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPropertyUpdatedNotification
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
        $admin = User::role("superadmin")->get();
        Notification::send($admin, new PropertyUpdatedNotification($event->property["id"], request()->user()));
    }
}
