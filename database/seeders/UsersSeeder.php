<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'fednerdab@gmail.com')->first()){
            User::create([
                'name' => 'Fedner',
                'email' => 'fednerdab@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
        if(!User::where('email', 'feddydab@gmail.com')->first()){
            User::create([
                'name' => 'Feddy',
                'email' => 'feddydab@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }
    }
}
