<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Metodo para iniciar sesión
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (auth()->attempt($request->only('email', 'password'))) {
            // Generar un token de acceso
            $token = auth()->user()->createToken('auth_token')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

        public function logout(Request $request)
        {
            // Revocar el token de acceso
            auth()->user()->tokens()->delete();

            return response()->json(['message' => 'Logged out successfully']);
        }
    
}
