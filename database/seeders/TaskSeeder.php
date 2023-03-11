<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* O BD IRÁ CRIAR OS 3 REGISTROS DE FORMA SEQUENCIAL */
        Task::create([
            "title" => "task of example 1",
            "description" => "helo world1",
            "due_date" => " 2022-09-21 00:00:00",
            "user_id" => 1,
            "category_id" => 1
        ]);
        Task::create([
            "title" => "task of example 2",
            "description" => "helo world2",
            "due_date" => " 2022-09-21 00:00:00",
            "user_id" => 2,
            "category_id" => 2
        ]);
        Task::create([
            "title" => "task of example 3",
            "description" => "helo world3",
            "due_date" => " 2022-09-21 00:00:00",
            "user_id" => 2,
            "category_id" => 2
        ]);
    }
}
