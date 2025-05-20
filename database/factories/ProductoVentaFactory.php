<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoVentaFactory extends Factory
{
    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),  // Crea un producto falso para cada relación
            'venta_id' => Venta::factory(),        // Crea una venta falsa para cada relación
            'cantidad' => fake()->numberBetween(1, 10),  // Cantidad de productos vendidos
            'precio' => fake()->randomFloat(2, 10, 500), // Precio de venta del producto
        ];
    }
}