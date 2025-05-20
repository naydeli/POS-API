<?php

namespace App\Http\Controllers;

use App\Models\CompraProducto;
use Illuminate\Http\Request;

class CompraProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CompraProducto::with(['compra', 'producto'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'compra_id' => 'required|exists:compras,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);

        return CompraProducto::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CompraProducto::with(['compra', 'producto'])->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $compraProducto = CompraProducto::findOrFail($id);

        $data = $request->validate([
            'cantidad' => 'sometimes|required|integer|min:1',
            'precio' => 'sometimes|required|numeric|min:0',
        ]);

        $compraProducto->update($data);

        return $compraProducto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compraProducto = CompraProducto::findOrFail($id);
        $compraProducto->delete();

        return response()->noContent();
    }
}
