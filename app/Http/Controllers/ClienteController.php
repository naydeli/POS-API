<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        return Cliente::create($request->all());
    }

    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return $cliente;
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(null, 204);
    }
}