<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $booking;
    public $customer;
    public $property;

    public $owner;

    public function __construct($booking, $customer, $property, $owner)
    {
        $this->booking = $booking;
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
                    ->line("Hello ". $this->owner->first_name .".")
                    ->line("Your property with the id ". $this->property->id ." has been booked")
                    ->line("The booking starts on ". $this->booking->booking_start ." and ends on ". $this->booking->booking_end)
                    ->action('View the booking by clicking this link:', route("booking.show", ["id" => $this->booking->id]))
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
