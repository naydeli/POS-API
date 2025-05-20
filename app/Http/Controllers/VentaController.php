<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las ventas con relaciones de cliente y producto
        $ventas = Venta::all();
        return response()->json($ventas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'fecha_venta' => 'required|date',
            'metodo_pago' => 'nullable|string|in:efectivo,tarjeta,transferencia',
            'estado' => 'nullable|string|in:pendiente,completada,cancelada',
            'observaciones' => 'nullable|string|max:255',
        ]);

        // Crear una nueva venta
        $venta = Venta::create($request->all());

        // Devolver la respuesta con la venta creada
        return response()->json($venta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscar la venta por ID con relaciones de cliente y producto
        $venta = Venta::with(['cliente', 'producto'])->find($id);

        if (!$venta) {
            return response()->json(['error' => 'Venta no encontrada'], 404);
        }

        return response()->json($venta, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Buscar la venta por ID
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json(['error' => 'Venta no encontrada'], 404);
        }

        $request->validate([
            'cliente_id' => 'sometimes|exists:clientes,id',
            'producto_id' => 'sometimes|exists:productos,id',
            'cantidad' => 'sometimes|integer|min:1',
            'precio_unitario' => 'sometimes|numeric|min:0',
            'total' => 'sometimes|numeric|min:0',
            'fecha_venta' => 'sometimes|date',
            'metodo_pago' => 'nullable|string|in:efectivo,tarjeta,transferencia',
            'estado' => 'nullable|string|in:pendiente,completada,cancelada',
            'observaciones' => 'nullable|string|max:255',
        ]);

        // Actualizar la venta
        $venta->update($request->all());

        return response()->json($venta, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar la venta por ID
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json(['error' => 'Venta no encontrada'], 404);
        }

        // Eliminar la venta
        $venta->delete();

        return response()->json(null, 204);
    }
}
