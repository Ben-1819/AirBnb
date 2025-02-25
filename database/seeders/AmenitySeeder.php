<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenity::create([
            "name" => "Hairdryer",
            "group" => "Bathroom"
        ]);

        Amenity::create([
            "name" => "Cleaning Products",
            "group" => "Bathroom"
        ]);

        Amenity::create([
            "name" => "Hot Water",
            "group" => "Bathroom"
        ]);

        Amenity::create([
            "name" => "Essentials",
            "group" => "Bathroom"
        ]);

        Amenity::create([
            "name" => "Shampoo",
            "group" => "Bathroom"
        ]);

        Amenity::create([
            "name" => "Washer",
            "group" => "Laundry"
        ]);

        Amenity::create([
            "name" => "Bed Linen",
            "group" => "Laundry"
        ]);

        Amenity::create([
            "name" => "Extra Pillows And Blankets",
            "group" => "Laundry"
        ]);

        Amenity::create([
            "name" => "Clothes Drying Rack",
            "group" => "Laundry"
        ]);

        Amenity::create([
            "name" => "Clothes Storage",
            "group" => "Laundry"
        ]);

        Amenity::create([
            "name" => "Indoor Fireplace",
            "group" => "Heating"
        ]);

        Amenity::create([
            "name" => "Portable Heater",
            "group" => "Heating"
        ]);

        Amenity::create([
            "name" => "Portable Heater",
            "group" => "Heating"
        ]);

        Amenity::create([
            "name" => "Radiant Heating",
            "group" => "Heating"
        ]);

        Amenity::create([
            "name" => "Air Conditioning",
            "group" => "Heating"
        ]);

        Amenity::create([
            "name" => "Smoke Alarm",
            "group" => "Security"
        ]);

        Amenity::create([
            "name" => "Carbon Monoxide Alarm",
            "group" => "Security"
        ]);

        Amenity::create([
            "name" => "Fire Extinguisher",
            "group" => "Security"
        ]);

        Amenity::create([
            "name" => "First Aid Kit",
            "group" => "Security"
        ]);

        Amenity::create([
            "name" => "Exterior Cameras",
            "group" => "Security"
        ]);

        Amenity::create([
            "name" => "Kitchen",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Fridge",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Microwave",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Cooking Basics",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Dishes and Cutlery",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Cooker",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Oven",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Kettle",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Wine Glasses",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Toaster",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Baking Sheet",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Dining Table",
            "group" => "Kitchen"
        ]);

        Amenity::create([
            "name" => "Back Garden",
            "group" => "Outdoor"
        ]);

        Amenity::create([
            "name" => "Firepit",
            "group" => "Outdoor"
        ]);

        Amenity::create([
            "name" => "Outdoor Furniture",
            "group" => "Outdoor"
        ]);

        Amenity::create([
            "name" => "Outdoor Dining Area",
            "group" => "Outdoor"
        ]);

        Amenity::create([
            "name" => "BBQ Grill",
            "group" => "Outdoor"
        ]);

        Amenity::create([
            "name" => "Seaside",
            "group" => "View"
        ]);

        Amenity::create([
            "name" => "Country",
            "group" => "View"
        ]);

        Amenity::create([
            "name" => "Mountains",
            "group" => "View"
        ]);

        Amenity::create([
            "name" => "City",
            "group" => "View"
        ]);

        Amenity::create([
            "name" => "Private Entrance",
            "group" => "Facilities"
        ]);

        Amenity::create([
            "name" => "Parking",
            "group" => "Facilities"
        ]);

        Amenity::create([
            "name" => "Single Floor Home",
            "group" => "Facilities"
        ]);

        Amenity::create([
            "name" => "High Chair",
            "group" => "Family"
        ]);

        Amenity::create([
            "name" => "Childrens Tableware",
            "group" => "Family"
        ]);

        /*Amenity::create([
            "name" => "Pets Allowed",
            "group" => "Services"
        ]);*/

        Amenity::create([
            "name" => "Long Term Stays",
            "group" => "Services"
        ]);

        Amenity::create([
            "name" => "TV",
            "group" => "Entertainment"
        ]);

        Amenity::create([
            "name" => "Wifi",
            "group" => "Internet"
        ]);
    }
}
