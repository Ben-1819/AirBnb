<?php

namespace App\Http\Requests;

use App\Rules\AmountOfGuests;
use App\Rules\AmountOfPets;
use App\Rules\BookingDates;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        log::info("Check if the current user is authenticated");
        if(auth()->check() == true){
            log::info("User is authenticated, allow them to make a booking");
            return true;
        }
        else{
            log::info("User is not authenticated, they are not authorised to make a booking");
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        // Define the validation rules
        return [
            "host_id" => ["required", "integer"],
            "property_id" => ["required", "integer"],
            "amount_of_guests" => ["required", "integer", new AmountOfGuests($request->amount_of_guests, $request->property_id)],
            "amount_of_pets" => ["required", "integer", new AmountOfPets($request->amount_of_pets, $request->property_id)],
            "booking_start" => ["required", "date", new BookingDates($request->property_id, $request->booking_start, $request->booking_end), "before:booking_end", Rule::date()->afterOrEqual(today()->addDays(7))],
            "booking_end" => ["required", "date", new BookingDates($request->property_id, $request->booking_start, $request->booking_end), "after:booking_start"],
        ];
    }

    public function messages(): array
    {
        // Write custom error messages
        $messages = [
            "host_id.required" => "Host id is a required field",
            "host_id.integer" => "Host id must be of the data type integer",
            "property_id.required" => "Property id is a required field",
            "property_id.integer" => "Property id must be of the data type integer",
            "amount_of_guests.required" => "Amount of guests is a required field",
            "amount_of_guests.integer" => "Amount of guests must be of the data type integer",
            "amount_of_pets.required" => "Amount of pets is a required field",
            "amount_of_pets.integer" => "Amount of pets must be of the data type integer",
            "booking_start.required" => "Booking start is a required field",
            "booking_start.date" => "Booking start must be of the data type date",
            "booking_start.before" => "Booking start date must be before the booking end date",
            "booking_start.afterOrEqual" => "Booking start date must be at least 7 days from today",
            "booking_end.required" => "Booking end is a required field",
            "booking_end.date" => "Booking end must be of the data type date",
            "booking_end.after" => "Booking end date must be after the booking start date",
        ];
        // Return the custom error messages
        return $messages;
    }
}
