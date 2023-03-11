<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ // campos para criar um registro aqui, seguindo o padrão de Category $fillable
            "title" => $this->faker->text(30),//titulo terá um texto aleatório de 30 caracteres
            "color" => $this->faker->safeHexColor(),//generate a color
            "user_id" => User::all()->random()//vou pegar o id de um usuário aleatório existente no bd
        ];
    }
}
