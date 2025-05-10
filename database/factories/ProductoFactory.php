<?php

namespace Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'descripcion' => fake()->sentence(),
            'precio' => fake()->randomFloat( 2, 50, 200),
            'costo' => fake()->randomFloat( 2,20,100),
            'stock' => fake()->numberBetween(1, 100),
            
        ];
    }
}
