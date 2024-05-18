<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Inventory;
use App\Models\Position;
use App\Models\Submission;
use App\Models\Suplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {  
        Position::factory()->create([
            'name' => 'Admin',
        ]);
        Position::factory()->create([
            'name' => 'User',
        ]);
        
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'position_id' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt('admin12345'), // password
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'position_id' => 2,
            'email_verified_at' => now(),
            'password' => bcrypt('user12345'), // password
            'remember_token' => Str::random(10),
        ]);
        // Position::factory(10)->create();
        // User::factory(50)->create();
        // Suplier::factory(50)->create();

        // Inventory::factory(20)->create();
        // Submission::factory(20)->create();
        
        // Inventory::factory(50)->create();        
        // Submission::factory(25)->create();
    }
}
