<?php

namespace App\Rules;

use Closure;
use App\Models\Property;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\ValidationRule;

class AmountOfPets implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $amount_of_pets;
    protected $property_id;

    public function __construct($amount_of_pets, $property_id){
        log::info("Pets to be added to booking: {amount_of_pets}", ["amount_of_pets" => $amount_of_pets]);
        $this->amount_of_pets = $amount_of_pets;
        $this->property_id = $property_id;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $property = Property::find($this->property_id);
        if($this->amount_of_pets > $property->max_pets){
            $fail('The amount of pets on the booking exceeds the maximum pets allowed.');
        }
    }
}
