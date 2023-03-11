<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* BOM PARA CADA REGISTRO EU TEREI QUE CRAR "NA MÃO". PARA TESTES UNITÁRIOS ISSO PODERIA SER UM PROBLEMA, PORQUE EU PRECISO DE 50 REGISTROS OU ATÉ MAIS, ENTÃO EXISTE AS FACTORIES. */
        
        //SEGUE A EXECUÇÃO DOS SEEDERS
        /*$this->call([
            UserSeeder::class,
            TaskSeeder::class
        ]);*/


        /* FACTORIES VÃO AQUI A BAIXO */
        User::factory(20)->create();
        Category::factory(10)->create(); //de alguma maneira ele puxa o CategoryFactory
        Task::factory(10)->create();
        //NomeModel::factory(quantidadeDeRegistro)->criar()


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
