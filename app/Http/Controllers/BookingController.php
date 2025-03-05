<?php

namespace App\Http\Controllers;

use App\Events\BookingCreated;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use App\Models\Property;
use App\Events\BookingUpdated;
use Event;
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
        $addBooking = $request->validated();

        $property = Property::find($request->property_id);
        $addBooking["customer_id"] = request()->user()->id;
        $addBooking["property_id"] = $property->id;

        $amount_of_nights = (Carbon::parse($request->booking_start)->diffInDays(Carbon::parse($request->booking_end)));

        log::info("Get the extra charges on the booking");
        $addBooking["extra_charges"] = strval((doubleval($property->price_per_pet) * doubleval($request->amount_of_pets)));

        log::info("Get the total cost of the booking");
        $addBooking["booking_cost"] = strval((doubleval($amount_of_nights) * doubleval($property->price_per_night)) + (doubleval($property->price_per_pet) * doubleval($request->amount_of_pets)));
        //(bcmul($property->price_per_pet, strval($request->amount_of_pets), 2)),
        //(bcmul(strval($amount_of_nights), $property->price_per_night, 2)) + (bcmul($property->price_per_pet, strval($request->amount_of_pets), 2)),
        log::info("Create new booking");
        $booking = new Booking($addBooking);
        $booking->save();

        log::info("Retrieving the record from the users table for the user who made the booking");
        $customer = User::find(request()->user()->id);

        log::info("Retrieving the record from the users table for the owner of the property");
        $owner = User::find($booking->host_id);

        log::info("Call the booking created event to send out a confirmation email and notification");
        Event::dispatch(new BookingCreated($booking, $property, $customer, $owner));

        return redirect()->route("booking.show", ["id" => $booking->id]);
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

        log::info("Validate the input");
        $newBooking = $request->validated();

        log::info("Get the old booking details so that they can be emailed to the user when the booking is updated");
        $oldBooking = Booking::find($request->booking_id);

        log::info("Calculate the amount of nights that the booking is for");
        $amount_of_nights = (Carbon::parse($request->booking_start)->diffInDays(Carbon::parse($request->booking_end)));

        $property = Property::find($request->property_id);

        log::info("Retrieving the record from the users table for the owner of the property");
        $owner = User::find($property->owner_id);

        log::info("Property price per pet = {price_per_pet}", ["price_per_pet" => $property->price_per_pet]);

        log::info("Set extra charges");
        $newBooking["extra_charges"] = $extra_charges = strval((doubleval($property->price_per_pet) * doubleval($request->amount_of_pets)));
        log::info("Get total costs");
        log::info("Maths looks like this: ". doubleval($amount_of_nights) ." * ". doubleval($property->price_per_night) ." = ". (doubleval($amount_of_nights) * doubleval($property->price_per_night)));
        $newBooking["booking_cost"] = $booking_cost = strval((doubleval($amount_of_nights) * doubleval($property->price_per_night)) + (doubleval($property->price_per_pet) * doubleval($request->amount_of_pets)));
        log::info("Booking cost should be: ". $booking_cost);
        log::info("Update the booking");

        log::info("Get the id of the booking being updated");
        $booking_idVar = $request->booking_id;

        $update_booking = Booking::where("id", $request->booking_id)->update($newBooking);



        log::info("Get the record from the users table that belongs to the user who made the booking");
        $customer = User::find($request->customer_id);

        log::info("Add the customer id to the array with updated values");
        $newBooking["customer_id"] = $request->customer_id;
        log::info("Add the booking id to the array with updated values");
        $newBooking["id"] = $booking_idVar;

        log::info("Call event to send out update confirmation email and notification");
        Event::dispatch(new BookingUpdated($newBooking, $oldBooking, $customer, $property, $owner));

        log::info("Returning to dashboard view");
        return redirect()->route("dashboard");
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
