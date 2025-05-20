<?php

namespace Database\Factories;

use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'compra_id' => Compra::factory(),
            'producto_id' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'precio' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
