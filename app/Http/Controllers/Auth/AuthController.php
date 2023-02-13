<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;

class AuthController extends Controller
{
    public function login(AuthRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'status' => '0',
                'message' => 'Credenciales incorrectas.'
            ], 401);
        }
        $token = auth()->login(auth()->user());

        return response()->json([
            'status' => '1',
            'message' => 'Has sido autenticado.',
            'access_token' => $token
        ], 201);
    }

    public function logout(): JsonResponse
    {
        auth()->logout(true);
        return response()->json([
            'status' => '1',
            'message' => 'Has cerrado sesión con éxito.'
        ], 200);
    }
}
