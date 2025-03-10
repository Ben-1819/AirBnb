<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;

class bookingOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        log::info("Get the id of the booking being dealt with from from the route parameters");
        $bookingId = $request->route("id");

        log::info("Find the record from the booking table where the id matches");
        $booking = Booking::find("id");

        log::info("Check if the current user is allowed to interact with the booking");
        if($booking->customer_id == request()->user()->id){
            log::info("User interacting with the booking is the creator of the booking.");
            return $next($request);
        }
        elseif($booking->host_id == request()->user()->id){
            log::info("Current user is the owner of the property on the booking");
            return $next($request);
        }
        elseif(request()->user()->hasRole("superadmin")){
            log::info("Current user is a superadmin");
            return $next($request);
        }
        else{
            log::info("Current user is not authorised to interact with this booking");
            abort(403, "Not authorised to access this page");
        }
    }
}
