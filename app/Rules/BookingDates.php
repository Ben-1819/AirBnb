<?php

namespace App\Rules;

use Closure;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\DataAwareRule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class BookingDates implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $property_id;
    protected $booking_start;
    protected $booking_end;

    public function __construct($property_id, $booking_start, $booking_end)
    {
        $this->property_id = $property_id;
        $this->booking_start = $booking_start;
        $this->booking_end = $booking_end;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Query the booking table to find if there is any overlap
        $conflictingBooking = DB::table('bookings')
            ->where('property_id', $this->property_id)
            ->where(function($query) {
                // Check if the start date of the current booking falls within any existing booking range
                $query->where(function($subQuery) {
                    $subQuery->where('booking_start', '<=', $this->booking_end)
                             ->where('booking_end', '>=', $this->booking_start);
                });
            })
            ->exists();

        // If there's a conflict, call the fail callback
        if ($conflictingBooking) {
            $fail('The selected property has already been booked within this date range.');
        }
    }
}
