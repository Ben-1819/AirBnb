<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        $bookings = Booking::where("property_id", $request->property_id)->get();
        foreach($bookings as $booking){
            if(request()->user()->id == $booking->customer_id){
                $allowed = 1;
            }
            elseif(request()->user()->hasRole("superadmin")){
                $allowed = 1;
            }
            else{
                $allowed = 0;
            }
        }

        if($allowed = 1){
            return true;
        }
        else{
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
        return [
            "property_id" => ["required", "integer"],
            "review_title" => ["required", "string", "max:50"],
            "review_contents" => ["required", "string", "max:1000"],
            "rating" => ["required", "integer", "max:5", "min:1"],
        ];
    }

    public function messages(): array
    {
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

        return $messages;
    }
}
