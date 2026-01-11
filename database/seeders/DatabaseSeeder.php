<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void 
    { 
        User::create([ 
            'nama' => 'Administrator', 
            'email' => 'admin@gmail.com', 
            'status' => 1, 
            'hp' => '0812345678901', 
            'password' => bcrypt('P@55word'), 
        ]); 
    } 
}


