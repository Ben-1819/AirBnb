<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        log::info("Check if the current user was the user who wrote the review or a superadmin");
        if(request()->user()->id == $request->reviewer_id){
            log::info("The current user wrote the review, they can proceed");
            return true;
        }
        elseif(request()->user()->hasRole("superadmin")){
            log::info("Current user is a superadmin, they can proceed");
            return true;
        }
        else{
            log::info("Current user is not a superadmin or the writer of the review, they are unauthorised");
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
            "review_title" => ["required", "string", "max:50"],
            "review_contents" => ["required", "string", "max:1000"],
            "rating" => ["required", "integer", "max:5", "min:1"],
        ];
    }

    public function messages(): array
    {
        // Create custom error messages for whenever validation rules are broken
        $messages = [
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
