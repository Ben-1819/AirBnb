<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class UpdatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        log::info("Check if the current user is the owner of the property or is a superadmin");
        if(request()->user()->id == $request->owner_id){
            log::info("Current user is the owner of the property, allow them to update it");
            return true;
        }
        elseif(request()->user()->hasRole("superadmin")){
            log::info("Current user has the superadmin role, allow them to update the property");
            return true;
        }
        else{
            log::info("User does not have the editProperty permission, they are not authorised to update the property");
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
            "main_category" => ["required", "string"],
            "sub_category1" => ["required", "string"],
            "sub_category2" => ["required", "string"],
            "max_guests" => ["required", "integer", "max:10", "min:1"],
            "number_of_bedrooms" => ["required", "integer", "max:10", "min:1"],
            "number_of_bathrooms" => ["required", "integer", "max:10", "min:1"],
            "description" => ["required", "string", "max:500"],
            "pets_allowed" => ["boolean"],
            "max_pets" => ["required", "integer", "max:10", "min:0"],
            "price_per_pet" => ["required", "string", "max:5", "min:1"],
            "price_per_night" => ["required", "string", "max:5", "min:1"]
        ];
    }

    public function messages(): array
    {
        // Create custom error messages
        $messages = [
            "main_category.required" => "Main category is a required field",
            "main_category.string" => "Main category must be of data type string",
            "sub_category1.required" => "Sub category 1 is a required field",
            "sub_category1.string" => "Sub category 1 must be of data type string",
            "sub_category2.required" => "Sub category 2 is a required field",
            "sub_category2.string" => "Sub category 2 must be of data type string",
            "max_guests.required" => "Max guests is a required field",
            "max_guests.integer" => "Max guests must be of data type integer",
            "max_guests.max" => "Max guests cannot be larger than 10",
            "max_guests.min" => "Max guests cannot be less than 1",
            "number_of_bedrooms.required" => "Number of bedrooms is a required field",
            "number_of_bedrooms.integer" => "Number of bedrooms must be of data type integer",
            "number_of_bedrooms.max" => "Number of bedrooms cannot be larger than 10",
            "number_of_bedrooms.min" => "Number of bedrooms cannot be less than 1",
            "number_of_bathrooms.required" => "Number of bathrooms is a required field",
            "number_of_bathrooms.integer" => "Number of bathrooms must be of data type integer",
            "number_of_bathrooms.max" => "Number of bathrooms cannot be larger than 10",
            "number_of_bathrooms.min" => "Number of bathrooms cannot be less than 1",
            "description.required" => "Description is a required field",
            "description.string" => "Description must be of data type string",
            "description.max" => "Description must not be more than 500 characters",
            "pets_allowed.boolean" => "Pets allowed must be of data type boolean",
            "max_pets.required" => "Max pets is a required field",
            "max_pets.integer" => "Max pets must be of data type integer",
            "max_pets.max" => "Max pets cannot be larger than 10",
            "max_pets.min" => "Max pets cannot be less than 0",
            "price_per_pet.required" => "Price per pet is a required field",
            "price_per_pet.max" => "Price per pet cannot be more than 5 digits",
            "price_per_pet.min" => "Price per pet cannot be less than 1 digit",
            "price_per_night.required" => "Price per night is a required field",
            "price_per_night.max" => "Price per night cannot be more than 5 digits",
            "price_pet_night.min" => "Price per night cannot be less than 1 digit",
        ];
        // Return the custom error messages
        return $messages;

    }
}
