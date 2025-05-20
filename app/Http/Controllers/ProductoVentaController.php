<?php

namespace App\Http\Controllers;

use App\Models\ProductoVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class ProductoVentaController extends Controller
{
    // GET /api/producto-venta
    public function index()
    {
        // Devuelve todas las relaciones producto-venta con los detalles completos
        $productoVentas = ProductoVenta::with(['producto', 'venta'])->get();

        return response()->json($productoVentas);
    }

    // POST /api/producto-venta
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'venta_id' => 'required|exists:ventas,id',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $venta = Venta::findOrFail($request->venta_id);
        $venta->productos()->attach($request->producto_id, [
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
        ]);

        
        $productoVenta = ProductoVenta::with(['producto', 'venta'])
            ->where('producto_id', $request->producto_id)
            ->where('venta_id', $request->venta_id)
            ->first();

        return response()->json($productoVenta, 201);
    }

    // DELETE /api/producto-venta/{id}
    public function destroy($id)
    {
        // Buscar y eliminar la relación producto-venta
        $productoVenta = ProductoVenta::findOrFail($id);
        $productoVenta->delete();

        return response()->json(null, 204);
    }
}