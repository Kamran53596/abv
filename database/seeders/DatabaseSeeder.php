<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Admin::create([
        //     'name' => 'Kamran',
        //     'email' => 'kamran.badalov@amiroff.az',
        //     'password' => Hash::make('123456789')
        // ]);

        $this->call(RolesAndPermissionsSeeder::class);
    }
}
