<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id' => \App\Models\Cliente::factory(),
            'producto_id' => \App\Models\Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'precio_unitario' => $this->faker->randomFloat(2, 1, 100),
            'total' => function (array $attributes) {
                return $attributes['cantidad'] * $attributes['precio_unitario'];
            },
            'fecha_venta' => $this->faker->date(),
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'tarjeta', 'transferencia']),
            'estado' => $this->faker->randomElement(['pendiente', 'completada', 'cancelada']),
            'observaciones' => $this->faker->optional()->sentence(),
        ];
    }
}
