<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get("/profile/show", [ProfileController::class, "show"])->name("profile.show");
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
})->middleware(['auth', 'verified']);

Route::name("property.")->prefix("/property")->group(function(){
    Route::get("", [PropertyController::class, "index"])->name("index");
    Route::get("/create", [PropertyController::class, "create"])->name("create")->middleware(['auth', 'verified']);
    Route::post("", [PropertyController::class, "store"])->name("store")->middleware(['auth', 'verified']);
    Route::get("/owned", [PropertyController::class, "usersProperties"])->name("owned")->middleware(['auth', 'verified']);
    Route::get("/{id}", [PropertyController::class, "show"])->name("show");
    Route::get("/{id}/edit", [PropertyController::class, "edit"])->name("edit")->middleware(['auth', 'verified']);
    Route::put("/{id}", [PropertyController::class, "update"])->name("update")->middleware(['auth', 'verified']);
    Route::delete("/{id}", [PropertyController::class, "destroy"])->name("destroy")->middleware(['auth', 'verified']);
    Route::patch("{/{id}/addReview", [PropertyController::class, "addReview"])->name("addReview")->middleware(['auth', 'verified']);
});

Route::name("amenity.")->prefix("/amenity")->group(function(){
    Route::get("", [AmenitiesController::class, "add"])->name("add");
    Route::post("", [AmenitiesController::class, "store"])->name("store");
    Route::get("/{id}/edit", [AmenitiesController::class, "edit"])->name("edit");
    Route::post("/edit", [AmenitiesController::class, "update"])->name("update");
    Route::delete("/{id}", [AmenitiesController::class, "destroyAll"])->name("destroyAll");
    Route::get("/{id}/list", [AmenitiesController::class, "list"])->name("list");
    Route::delete("/{id}/delete", [AmenitiesController::class, "delete"])->name("destroy");
})->middleware(['auth', 'verified']);

Route::name("booking.")->prefix("/booking")->group(function(){
    Route::get("", [BookingController::class, "index"])->name("index");
    Route::get("/{id}/create", [BookingController::class, "create"])->name("create");
    Route::post("", [BookingController::class, "store"])->name("store");
    Route::get("/{id}", [BookingController::class, "show"])->name("show");
    Route::get("/{id}/edit", [BookingController::class, "edit"])->name("edit");
    Route::put("/{id}", [BookingController::class, "update"])->name("update");
    Route::delete("/{id}", [BookingController::class, "destroy"])->name("destroy");
})->middleware(['auth', 'verified']);

Route::name("review.")->prefix("/review")->group(function(){
    Route::get("", [ReviewController::class, "index"])->name("index");
    Route::get("/create", [ReviewController::class, "create"])->name("create");
    Route::post("", [ReviewController::class, "store"])->name("store");
    Route::get("/{id}", [ReviewController::class, "show"])->name("show");
    Route::get("/{id}/edit", [ReviewController::class, "edit"])->name("edit");
    Route::put("/{id}", [ReviewController::class, "update"])->name("update");
    Route::delete("/{id}", [ReviewController::class, "destroy"])->name("destroy");
});


require __DIR__.'/auth.php';
