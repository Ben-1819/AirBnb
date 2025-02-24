<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(["name" => "addProperty"]);
        Permission::create(["name" => "viewProperty"]);
        Permission::create(["name" => "editProperty"]);
        Permission::create(["name" => "deleteProperty"]);
    }
}
