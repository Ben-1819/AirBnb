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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("host_id")->constrained("users");
            $table->foreignId("customer_id")->constrained("users");
            $table->foreignId("property_id")->constrained("properties");
            $table->integer("amount_of_guests");
            $table->integer("amount_of_pets")->nullable();
            $table->string("extra_charges");
            $table->string("booking_cost");
            $table->date("booking_start");
            $table->date("booking_end");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
