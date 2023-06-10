<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        User::create([
            'name' => 'AlfreDo Rivera',
            'email' => 'alfredo@example.com',
            'password' => bcrypt('alfredo123'),
        ])->assignRole('SuperAdmin');

        User::create([
            'name' => 'ArGel Rodriguez',
            'email' => 'argeljhoan@example.com',
            'password' => bcrypt('argel123'),
        ])->assignRole('Admin');


        User::create([
            'name' => 'ciudadano',
            'email' => 'ciudadano@example.com',
            'password' => bcrypt('ciudadano123'),
        ])->assignRole('Usuario');
    }
}
