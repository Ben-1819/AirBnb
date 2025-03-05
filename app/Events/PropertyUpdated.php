<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PropertyUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $property;
    public $oldProperty;
    public $owner;
    public function __construct($property, $oldProperty, $owner)
    {
        $this->property = $property;
        $this->oldProperty = $oldProperty;
        $this->owner = $owner;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('property-updated'),
        ];
    }

    public function broadcastWith():array
    {
        return[
            "first_name" => $this->owner->first_name,
            "email" => $this->owner->email,
            "property_id" => $this->property->id,
            "location" => $this->property->location,
            "address" => $this->property->address,
            "main_category" => $this->property->main_category,
            "sub_category1" => $this->property->sub_category1,
            "sub_category2" => $this->property->sub_category2,
            "max_guests" => $this->property->max_guests,
            "number_of_bedrooms" => $this->property->number_of_bedrooms,
            "number_of_bathrooms" => $this->property->number_of_bathrooms,
            "description" => $this->property->description,
            "number_of_reviews" => $this->property->number_of_reviews,
            "avg_rating" => $this->property->avg_rating,
            "number_times_booked" => $this->property->number_times_booked,
            "pets_allowed" => $this->property->pets_allows,
            "max_pets" => $this->property->max_pets,
            "price_per_pet" => $this->property->price_per_pet,
            "price_per_night" => $this->property->price_per_night,
        ];
    }

    public function broadcastAs(): string
    {
        return 'updated-property';
    }
}
