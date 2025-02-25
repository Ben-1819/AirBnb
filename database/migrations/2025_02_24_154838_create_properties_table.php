<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId("owner_id")->constrained("users");
            $table->string("location");
            $table->string("address");
            $table->string("main_category");
            $table->string("sub_category1");
            $table->string("sub_category2");
            $table->integer("max_guests");
            $table->integer("number_of_bedrooms");
            $table->integer("number_of_bathrooms");
            $table->string("description");
            $table->integer("number_of_reviews");
            $table->double("avg_rating");
            $table->integer("number_times_booked");
            $table->boolean("pets_allowed");
            $table->integer("max_pets");
            $table->string("price_per_pet");
            $table->string("price_per_night");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
