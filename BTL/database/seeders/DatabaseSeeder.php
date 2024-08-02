<?php

namespace Database\Seeders;

use App\Models\User;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //MARK: - User
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('Vuthithanh123@'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Thanh',
            'email' => 'thanh@example.com',
            'password' => Hash::make('Vuthithanh123@'),
            'role' => 'reader',
        ]);      
        
        $this->call(CategorySeeder::class);  
    }
}
