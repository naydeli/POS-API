<?php

use App\Models\Producto;
use App\Models\Venta;
use App\Models\Compra;
use App\Models\ProductoVenta;
use App\Models\CompraProducto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(1)->create([
            'name' => 'Admin',
            'email' => 'naydeli@naydeli',
        ]);


        // Crear 10 productos
        $productos = Producto::factory(10)->create();

        // Crear 5 ventas
        $ventas = Venta::factory(5)->create();

        // Relacionar productos con ventas
        foreach ($ventas as $venta) {
            // Seleccionar aleatoriamente de 1 a 3 productos por venta
            $productosSeleccionados = $productos->random(rand(1, 3));

            foreach ($productosSeleccionados as $producto) {
                $venta->productos()->attach($producto->id, [
                    'cantidad' => rand(1, 5),
                    'precio' => $producto->precio,
                ]);
            }
        }

        // Crear 5 compras
        $compras = Compra::factory(5)->create();

        // Relacionar productos con compras
        foreach ($compras as $compra) {
            // Seleccionar aleatoriamente de 1 a 3 productos por compra
            $productosSeleccionados = $productos->random(rand(1, 3));

            foreach ($productosSeleccionados as $producto) {
                $compra->productos()->create([
                    'producto_id' => $producto->id,
                    'compra_id' => $compra->id,
                    'cantidad' => rand(1, 5),
                    'precio' => $producto->precio,
                ]);
            }
        }
    }
}
