<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        log::info("Check if the current user has booked the property before");
        log::info("Get all records from the booking table where property_id matches the property id that the user is reviewing");
        $bookings = Booking::where("property_id", $request->property_id)->get();
        log::info("Loop through all retrieved records");
        foreach($bookings as $booking){
            if(request()->user()->id == $booking->customer_id){
                $allowed = 1;
                log::info("The user has booked this property before, setting allowed to " .$allowed);
                log::info("Breaking the loop as user has booked the property before");
                break;
            }
            else{
                $allowed = 0;
                log::info("User is not the user who booked in record ". $booking->id . "setting allowed to ". $allowed );
            }
        }

        if($allowed = 1){
            log::info("The user has booked this property before, they are allowed to review it");
            return true;
        }
        else{
            log::info("The user has not booked this property before, they are not authorised to review it");
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Define the validation rules
        return [
            "property_id" => ["required", "integer"],
            "review_title" => ["required", "string", "max:50"],
            "review_contents" => ["required", "string", "max:1000"],
            "rating" => ["required", "integer", "max:5", "min:1"],
        ];
    }

    public function messages(): array
    {
        // Create custom error messages to be displayed if validation rules are broken
        $messages = [
            "property_id.required" => "Property ID is a required field",
            "property_id.integer" => "Property ID must be of data type integer",
            "review_title.required" => "Review title is a required field",
            "review_title.string" => "Review title must be of data type string",
            "review_title.max" => "Review title must not be more than 50 characters",
            "review_contents.required" => "Review contents is a required field",
            "review_contents.string" => "Review contents must be of data type string",
            "review_contents.max" => "Review contents must not be more than 1000 characters",
            "rating.required" => "Rating is a required field",
            "rating.integer" => "Rating must be of data type integer",
            "rating.max" => "Rating must be 5 or less",
            "rating.min" => "Rating must be 1 or more",
        ];

        // Return the custom error messages
        return $messages;
    }
}
