<?php

namespace App\Rules;

use Closure;
use App\Models\Property;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\ValidationRule;

class AmountOfGuests implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $amount_of_guests;
    protected $property_id;

    public function __construct($amount_of_guests, $property_id){
        $this->amount_of_guests = $amount_of_guests;
        $this->property_id = $property_id;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $property = Property::find($this->property_id);
        if($this->amount_of_guests > $property->max_guests){
            $fail('The amount of guests on the booking exceeds the maximum guests allowed.');
        }
    }
}
