<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use App\Models\Property;
use App\Mail\BookingConfirmation;
use Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        log::info("Get all bookings");
        $all_bookings = Booking::all();
        log::info("Pass all bookings into bookings.index");
        return view("booking.index", compact("all_bookings"));
    }

    public function usersBookings(){
        log::info("Get all bookings where the customer_id matches the users id");
        $users_bookings = Booking::where("customer_id", request()->user()->id);
        log::info("Pass users bookings into bookings.users");
        return view("booking.users", compact("users_bookings"));
    }

    public function hostsBookings(){
        log::info("Get all bookings where the host_id matches the users id");
        $users_bookings = Booking::where("host_id", request()->user()->id);
        log::info("Pass users bookings into bookings.hosts");
        return view("bookings.hosts", compact("users_bookings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $property = Property::find($id);
        log::info("Returning booking.create view");
        return view("booking.create", compact ("property"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        log::info("Validate the input");
        $request->validated();

        $property = Property::find($request->property_id);

        $amount_of_nights = (Carbon::parse($request->booking_start)->diffInDays(Carbon::parse($request->booking_end)));
        //(bcmul($property->price_per_pet, strval($request->amount_of_pets), 2)),
        //(bcmul(strval($amount_of_nights), $property->price_per_night, 2)) + (bcmul($property->price_per_pet, strval($request->amount_of_pets), 2)),
        log::info("Create new booking");
        $booking = new Booking([
            "host_id" => $request->host_id,
            "customer_id" => request()->user()->id,
            "property_id" => $property->id,
            "amount_of_guests" => $request->amount_of_guests,
            "amount_of_pets" => $request->amount_of_pets,
            "extra_charges" => strval((doubleval($property->price_per_pet) * doubleval($request->amount_of_pets))),
            "booking_cost" => strval((doubleval($amount_of_nights) * doubleval($property->price_per_night)) + (doubleval($property->price_per_pet) * doubleval($request->amount_of_pets))),
            "booking_start" => $request->booking_start,
            "booking_end" => $request->booking_end,
        ]);
        $booking->save();
        log::info("Booking Saved!");
        log::info("Host on booking: {$booking->host_id}");
        log::info("Customer on booking: {$booking->customer_id}");
        log::info("Property on booking: {$booking->property_id}");
        log::info("Amount of guests on booking: {$booking->amount_of_guests}");
        log::info("Amount of pets on booking: {$booking->amount_of_pets}");
        log::info("Extra charges on booking: {$booking->extra_charges}");
        log::info("Total Cost of Booking: {$booking->booking_cost}");
        log::info("Booking start date: {$booking->booking_start}");
        log::info("Booking end date: {$booking->booking_end}");

        log::info("Returning to booking.show view");
        $id = $booking->id;

        log::info("Retrieving the record from the users table for the user who made the booking");
        $customer = User::find(request()->user()->id);

        log::info("Retrieving the record from the users table for the owner of the property");
        $owner = User::find($booking->host_id);

        log::info("Sending the user who made the booking a confirmation email");
        Mail::to(request()->user()->email)->send(new BookingConfirmation($booking, $customer, $owner));
        return redirect()->route("booking.show", compact("id"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking, $id)
    {
        //Stop users who did not create the booking or own the property from viewing the booking
        log::info("Retrieve the record from the booking table that has the same ID as the one passed");
        $booking = Booking::find($id);
        if($booking->customer_id == request()->user()->id){
            log::info("Return booking.show view");
            return view("booking.show", compact("booking"));
        }
        elseif($booking->host_id == request()->user()->id){
            log::info("Return booking.show view");
            return view("booking.show", compact("booking"));
        }
        else{
            log::info("User tying to view the booking was not the creator of the booking or the owner of the property");
            abort(403);
        }

        //$booking = Booking::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking, $id)
    {
        //Stop users who did not create the booking or own the property from editing the booking
        log::info("Retrieve the record from the booking table that has the same ID as the one passed");
        $booking = Booking::find($id);
        if($booking->customer_id == request()->user()->id){
            log::info("Return booking.edit view");
            return view("booking.edit", compact("booking"));
        }
        elseif($booking->host_id == request()->user()->id){
            log::info("Return booking.edit view");
            return view("booking.edit", compact("booking"));
        }
        else{
            log::info("User tying to edit the booking was not the creator of the booking or the owner of the property");
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //Stop users who did not create the booking or own the property from updating the booking
        if($booking->customer_id == request()->user()->id){

        }
        elseif($booking->host_id == request()->user()->id){

        }
        else{
            log::info("User tying to update the booking was not the creator of the booking or the owner of the property");
            abort(403);
        }

        log::info("Validate the input");
        $request->validated();
        log::info("Get the record belonging to the property on the booking from the properties table");
        //$property = Property::find($request->property_id);

        $amount_of_nights = (Carbon::parse($request->booking_start)->diffInDays(Carbon::parse($request->booking_end)) - 1);

        $property = Property::find($booking->property_id);
        log::info("Update the booking");
        $update_booking = Booking::find($booking->id)->update(attributes: [
            "host_id" => $request->host_id,
            "customer_id" => request()->user()->id,
            "property_id" => $property->id,
            "amount_of_guests" => $request->amount_of_guests,
            "amount_of_pets" => $request->amount_of_pets,
            "extra_charges" => strval((doubleval($property->price_per_pet) * doubleval($request->amount_of_pets))),
            "booking_cost" => strval((doubleval($amount_of_nights) * doubleval($property->price_per_night)) + (doubleval($property->price_per_pet) * doubleval($request->amount_of_pets))),
            "booking_start" => $request->booking_start,
            "booking_end" => $request->booking_end,
        ]);
        log::info("Booking updated!");
        log::info("Host on booking: {$update_booking->host_id}");
        log::info("Customer on booking: {$booking->customer_id}");
        log::info("Property on booking: {$booking->property_id}");
        log::info("Amount of guests on booking: {$booking->amount_of_guests}");
        log::info("Amount of pets on booking: {$booking->amount_of_pets}");
        log::info("Extra charges on booking: {$booking->extra_charges}");
        log::info("Total Cost of Booking: {$booking->booking_cost}");
        log::info("Booking start date: {$booking->booking_start}");
        log::info("Booking end date: {$update_booking->booking_end}");

        log::info("Returning to booking.show view");
        $id = $update_booking->id;
        return redirect()->route("booking.show", compact("id"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //Stop users who did not create the booking or own the property from deleting the booking
        if($booking->customer_id == request()->user()->id){

        }
        elseif($booking->host_id == request()->user()->id){

        }
        else{
            log::info("User tying to delete the booking was not the creator of the booking or the owner of the property");
            abort(403);
        }
        log::info("Delete the record from the booking table that has the same id as the one passed");
        Booking::where("id", $booking->id)->delete();
        log::info("Booking Deleted, returning to dashboard");
        return redirect()->route("dashboard");
    }
}
