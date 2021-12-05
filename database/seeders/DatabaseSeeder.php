<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Usuário de teste com credenciais estáticas
        \App\Models\User::factory()->test()->create();
        \App\Models\User::factory(10)->create();
    }
}
