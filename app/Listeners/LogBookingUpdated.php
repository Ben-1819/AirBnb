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
        log::info("Booking updated!");
        log::info("Booking id: {id}", ["id" => $event->booking["id"]]);
        log::info("Customer on booking: {customer_id}", ["customer_id" => $event->booking["customer_id"]]);
        log::info("Property on booking: {property_id}", ["property_id" => $event->booking["property_id"]]);
        log::info("Amount of guests on booking: {amount_of_guests}", ["amount_of_guests" => $event->booking["amount_of_guests"]]);
        log::info("Amount of pets on booking: {amount_of_pets}", ["amount_of_pets" => $event->booking["amount_of_pets"]]);
        log::info("Extra charges on booking: {extra_charges}", ["extra_charges" => $event->booking["extra_charges"]]);
        log::info("Total Cost of Booking: {booking_cost}", ["booking_cost" => $event->booking["booking_cost"]]);
        log::info("Booking start date: {booking_start}", ["booking_start" => $event->booking["booking_start"]]);
        log::info("Booking end date: {booking_end}", ["booking_end" => $event->booking["booking_end"]]);
    }
}
