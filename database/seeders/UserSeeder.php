<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@g.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);
        
        User::factory()->create([
            'name' => 'Editor Man',
            'email' => 'editor_man@g.com',
            'password' => Hash::make('12345'),
            'role' => 'editor',
        ]);

        User::factory()->create([
            'name' => 'Editor Woman',
            'email' => 'editor_woman@g.com',
            'password' => Hash::make('12345'),
            'role' => 'editor',
        ]);
        
        User::factory()->create([
            'name' => 'Viewer User',
            'email' => 'viewer@g.com',
            'password' => Hash::make('12345'),
            'role' => 'viewer',
        ]);
    }
}
