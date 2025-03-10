<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PropertyFiltering;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\propertyOwner;
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

Route::name("property.")->prefix("/property")->controller(PropertyController::class)->group(function(){
    Route::get("", "index")->name("index");
    Route::get("/create", "create")->name("create")->middleware(['auth', 'verified']);
    Route::post("", "store")->name("store")->middleware(['auth', 'verified']);
    Route::get("/owned", "usersProperties")->name("owned")->middleware(['auth', 'verified']);
    Route::get("/{id}", "show")->name("show");
    Route::get("/{id}/edit", "edit")->name("edit")->middleware(['auth', 'verified', "propertyOwner"]);
    Route::put("/{id}", "update")->name("update")->middleware(['auth', 'verified', "propertyOwner"]);
    Route::delete("/{id}", "destroy")->name("destroy")->middleware(['auth', 'verified', "propertyOwner"]);
    Route::patch("/{id}/addReview", "addReview")->name("addReview")->middleware(['auth', 'verified']);
});

Route::name("amenity.")->prefix("/amenity")->controller(AmenitiesController::class)->group(function(){
    Route::get("", "add")->name("add");
    Route::post("", "store")->name("store");
    Route::get("/{id}/edit", "edit")->name("edit")->middleware("propertyOwner");
    Route::post("/edit", "update")->name("update");
    Route::delete("/{id}", "destroyAll")->name("destroyAll")->middleware("propertyOwner");
    Route::get("/{id}/list", "list")->name("list")->middleware("propertyOwner");
    Route::delete("/{id}/delete", "delete")->name("destroy")->middleware("propertyOwner");
})->middleware(['auth', 'verified']);

Route::name("booking.")->prefix("/booking")->controller(BookingController::class)->group(function(){
    Route::get("", "index")->name("index");
    Route::get("/{id}/create", "create")->name("create");
    Route::post("", "store")->name("store");
    Route::get("/{id}", "show")->name("show")->middleware("bookingOwner");
    Route::get("/{id}/edit", "edit")->name("edit")->middleware("bookingOwner");
    Route::put("/{id}", "update")->name("update")->middleware("bookingOwner");
    Route::delete("/{id}", "destroy")->name("destroy")->middleware("bookingOwner");
})->middleware(['auth', 'verified']);

Route::name("review.")->prefix("/review")->controller(ReviewController::class)->group(function(){
    Route::get("", "index")->name("index");
    Route::get("/{property}/create", "create")->name("create");
    Route::post("", "store")->name("store");
    Route::get("/{id}", "show")->name("show");
    Route::get("/{id}/edit", "edit")->name("edit")->middleware("reviewOwner");
    Route::put("/{id}", "update")->name("update");
    Route::delete("/{id}", "destroy")->name("destroy")->middleware("reviewOwner");
});

Route::name("location.")->prefix("/location")->controller(LocationController::class)->group(function(){
    Route::get("/{id}", "create")->name("create")->middleware("propertyOwner");
    Route::post("", "store")->name("store");
});

Route::name("filter.")->prefix("/filter")->controller(PropertyFiltering::class)->group(function(){
    Route::get("/state", "filterCountry")->name("country");
    Route::get("/city", "filterCity")->name("city");
    Route::get("/category", "filterCategory")->name("category");
});

require __DIR__.'/auth.php';
