<?php

namespace Database\Seeders;
// this is seeders namespace


use App\Models\Admin;
// this is admin model
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), // This will be hashed
        ]);
    }
}