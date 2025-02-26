<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*$user = User::factory()->create([
            'first_name' => 'Ben',
            "last_name" => "Brown",
            "DOB" => "2004/12/25",
            'email' => 'ben@gmail.com',
            'email_verified_at',
            "password" => Hash::make("password")
        ]);*/

        //$user->assignRole("superadmin");

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AmenitySeeder::class);
        $host = Role::findByName("host");
        $host->givePermissionTo(["addProperty", "viewProperty", "editProperty", "deleteProperty"]);
        $consumer = Role::findByName("customer");
        $consumer->givePermissionTo("viewProperty");
        $superadmin = Role::findByName("superadmin");
        $superadmin->givePermissionTo(["addProperty", "viewProperty", "editProperty", "deleteProperty"]);

    }
}
