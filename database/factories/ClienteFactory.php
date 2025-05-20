<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'direccion' => fake()->address(),
            'telefono' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}