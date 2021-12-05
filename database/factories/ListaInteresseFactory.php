<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListaInteresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo_bolos_id' => rand(1, 10),
            'clientes_id' => rand(1, 10)
        ];
    }
}
