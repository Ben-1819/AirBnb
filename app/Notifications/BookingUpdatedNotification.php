<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingUpdatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $booking;
    public $oldBooking;
    public $customer;
    public $property;
    public $owner;
    public function __construct($booking, $oldBooking, $customer, $property, $owner)
    {
        $this->booking = $booking;
        $this->oldBooking = $oldBooking;
        $this->customer = $customer;
        $this->property = $property;
        $this->owner = $owner;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line("Hello ". $this->owner->first_name ." a booking on your property has been updated")
                    ->line("The id of the booking is ". $this->booking["id"])
                    ->line("Old booking start date ". $this->oldBooking->booking_start)
                    ->line("New booking start date ". $this->booking["booking_start"])
                    ->line("Old booking end date ". $this->oldBooking->booking_end)
                    ->line("New booking end date ". $this->booking["booking_end"])
                    ->action("View the updated booking:", route("booking.show", ["id" => $this->booking["id"]]))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
