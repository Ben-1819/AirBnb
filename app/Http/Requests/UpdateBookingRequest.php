<?php

namespace App\Http\Requests;

use App\Rules\AmountOfGuests;
use App\Rules\AmountOfPets;
use App\Rules\BookingDates;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        log::info("Check if user is authorised to update the booking");
        log::info("Find the record from the booking table being updated");
        $booking = Booking::find($request->booking_id);
        log::info("If the user is the owner of the property on the booking, the user who made the booking or the superadmin authorise them to update the booking");
        if(request()->user()->id == $booking->customer_id){
            log::info("The current user is the user who made the booking, allow them to update it");
            return true;
        }
        elseif(request()->user()->id == $booking->host_id){
            log::info("Current user is the owner of the property on the booking, allow them to update it");
            return true;
        }
        elseif(request()->user()->hasRole("superadmin")){
            log::info("The current user is a superadmin, allow them to update the booking");
            return true;
        }
        else{
            log::info("User is not authorised to update the booking");
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
        // Define validation rules
        return [
            "host_id" => ["required", "integer"],
            "property_id" => ["required", "integer"],
            "amount_of_guests" => ["required", "integer", new AmountOfGuests($request->amount_of_guests, $request->property_id)],
            "amount_of_pets" => ["required", "integer", new AmountOfPets($request->amount_of_pets, $request->property_id)],
            "booking_start" => ["required", "date", new BookingDates($request->property_id, $request->booking_start, $request->booking_end), "before:booking_end", Rule::date()->afterOrEqual(today()->addDays(7))],
            "booking_end" => ["required", "date", new BookingDates($request->property_id, $request->booking_start, $request->booking_end), "after:booking_start"],
        ];
    }

    public function messages():array
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
