<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_id = Category::all()->random();//pega um registro de categoria aleatório já existente
        return [
            "is_done" => $this->faker->boolean(55),
            "title" => $this->faker->text(30),
            "description" => $this->faker->text(50),
            "due_date" => $this->faker->dateTime(),
            "user_id" => $category_id->getAttribute('user_id'), //vou pegar o id de um usuário aleatório existente no bd. SEGUE A MESMA LINHA DE RACIONCÍNIO COM AS CATEGORIAS
            "category_id" => $category_id->getAttribute('id')
        ];
        /*OU 
            $user = User::all()->random();
            while(count($user->categories) == 0 ) {
                $user = User::all()->random();
            }
            return [
            "title" => $this->faker->text(30),
            "description" => $this->faker->text(50),
            "due_date" => $this->faker->dateTime(),
            "user_id" => $user,
            "category_id" => $userid->categories
        ];
        */
    }
}
