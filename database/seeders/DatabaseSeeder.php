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
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at',
            "password" => Hash::make("password")
        ]);

        $user->assignRole("host");*/

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $host = Role::findByName("host");
        $host->givePermissionTo(["addProperty", "viewProperty", "editProperty", "deleteProperty"]);
        $consumer = Role::findByName("consumer");
        $consumer->givePermissionTo("viewProperty");

    }
}
