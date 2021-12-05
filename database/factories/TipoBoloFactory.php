<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipoBoloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => Str::random(10),
            'valor' => $this->faker->randomFloat(2, 20, 30),
            'peso' => $this->faker->randomFloat(2, 0.8 , 2.0),
        ];
    }
}
