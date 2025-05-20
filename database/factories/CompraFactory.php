<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compra>
 */
class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'proveedor_id' => \App\Models\Proveedor::inRandomOrder()->first()->id ?? \App\Models\Proveedor::factory(),
            'producto_id' => \App\Models\Producto::inRandomOrder()->first()->id ?? \App\Models\Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'precio_unitario' => $this->faker->randomFloat(2, 1, 100),
            'total' => fn(array $attributes) => $attributes['cantidad'] * $attributes['precio_unitario'],
            'fecha_compra' => $this->faker->date(),
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'tarjeta', 'transferencia']),
            'estado' => $this->faker->randomElement(['pendiente', 'completada', 'cancelada']),
            'observaciones' => $this->faker->optional()->sentence(),
            'tipo_documento' => $this->faker->randomElement(['factura', 'boleta', 'recibo']),
            'numero_documento' => $this->faker->optional()->numerify('####'),
            'moneda' => $this->faker->randomElement(['cordobas', 'dolares']),
            'tipo_cambio' => $this->faker->optional()->randomFloat(2, 1, 30),
            'forma_pago' => $this->faker->randomElement(['contado', 'crédito']),
        ];
    }
}
