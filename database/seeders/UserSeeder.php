<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Mateus Azaf Martins Lima",
            "email" => "irineu123@gmail.com",
            "password" => Hash::make('123123')
        ]);
        User::create([
            "name" => "Irineu Lucas Irineu Martins",
            "email" => "lucasirineumartins@gmail.com",
            "password" => Hash::make('123123')
        ]);
        User::create([
            "name" => "Pedro Emanuel Martins Lima",
            "email" => "pedroemanuel71@gmail.com",
            "password" => Hash::make('123123')
        ]);
    }
}
