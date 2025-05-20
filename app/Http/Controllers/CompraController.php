<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with(['proveedor', 'productos'])->get();
        return response()->json($compras);
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedor,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'fecha_compra' => 'required|date',
            'metodo_pago' => 'nullable|string|in:efectivo,tarjeta,transferencia',
            'estado' => 'nullable|string|in:pendiente,completada,cancelada',
            'observaciones' => 'nullable|string|max:255',
            'tipo_documento' => 'nullable|string|in:factura,boleta,recibo',
            'numero_documento' => 'nullable|string|max:255',
            'moneda' => 'nullable|string|in:cordobas,dolares',
            'tipo_cambio' => 'nullable|numeric|min:0',
            'forma_pago' => 'nullable|string|in:contado,crédito',
        ]);

        $compra = Compra::create($request->all());

        return response()->json($compra, 201);
    }

    public function show(string $id)
    {
        $compra = Compra::with(['proveedor', 'producto'])->findOrFail($id);
        return response()->json($compra);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'proveedor_id' => 'sometimes|exists:proveedores,id',
            'producto_id' => 'sometimes|exists:productos,id',
            'cantidad' => 'sometimes|integer|min:1',
            'precio_unitario' => 'sometimes|numeric|min:0',
            'total' => 'sometimes|numeric|min:0',
            'fecha_compra' => 'sometimes|date',
            'metodo_pago' => 'sometimes|string|in:efectivo,tarjeta,transferencia',
            'estado' => 'sometimes|string|in:pendiente,completada,cancelada',
            'observaciones' => 'sometimes|string|max:255',
            'tipo_documento' => 'sometimes|string|in:factura,boleta,recibo',
            'numero_documento' => 'sometimes|string|max:255',
            'moneda' => 'sometimes|string|in:cordobas,dolares',
            'tipo_cambio' => 'sometimes|numeric|min:0',
            'forma_pago' => 'sometimes|string|in:contado,crédito',
        ]);

        $compra = Compra::findOrFail($id);
        $compra->update($request->all());

        return response()->json($compra, 200);
    }

    public function destroy(string $id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();

        return response()->json(null, 204);
    }
}
