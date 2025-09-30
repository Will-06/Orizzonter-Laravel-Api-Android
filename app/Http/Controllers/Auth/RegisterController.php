<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            // 1. Validar los datos del formulario
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // 2. Encontrar el ID del rol "cliente"
            $clienteRole = Role::where('name', 'cliente')->first();

            if (!$clienteRole) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'El rol de cliente no se encontró. Contacta al administrador.',
                ], 500);
            }

            // 3. Crear el nuevo usuario y asignar el rol
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $clienteRole->id,
            ]);

            // 4. (Opcional) Autenticar y devolver el token
            $token = auth('api')->login($user);

            return response()->json([
                'status' => 'success',
                'message' => 'Usuario registrado y autenticado con éxito',
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60,
            ], 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }
}
