<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReviewCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $property_id;
    public $reviewer;
    public $review;
    public function __construct($property_id, $reviewer, $review)
    {
        $this->property_id = $property_id;
        $this->reviewer = $reviewer;
        $this->review = $review;
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
                    ->line("A review has been created on your property.")
                    ->line("Property reviewed: ". $this->property_id)
                    ->line("Reviewer: ". $this->reviewer->first_name ." ". $this->reviewer->last_name)
                    ->action('Read review', route("review.show", ["id" => $this->review->id]))
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
