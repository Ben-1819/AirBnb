<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AmenitiesController;
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
});

Route::name("property.")->prefix("/property")->group(function(){
    Route::get("", [PropertyController::class, "index"])->name("index");
    Route::get("/create", [PropertyController::class, "create"])->name("create");
    Route::post("", [PropertyController::class, "store"])->name("store");
    Route::get("/{id}", [PropertyController::class, "show"])->name("show");
    Route::get("/{id}/edit", [PropertyController::class, "edit"])->name("edit");
    Route::put("/{id}", [PropertyController::class, "update"])->name("update");
    Route::delete("/{id}", [PropertyController::class, "destroy"])->name("destroy");
});

Route::name("amenity.")->prefix("/amenity")->group(function(){
    Route::get("", [AmenitiesController::class, "add"])->name("add");
    Route::post("/post", [AmenitiesController::class, "store"])->name("store");
});

require __DIR__.'/auth.php';
