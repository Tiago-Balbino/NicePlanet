<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {

            $credentials = $request->only(['nomeUsuario', 'senhaUsuario']);

            if (Auth::attempt(['nomeUsuario' => $credentials['nomeUsuario'], 'password' => $credentials['senhaUsuario']])) {
                $user = Auth::user();
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json(['token' => $token], 200);
            }
            return response()->json(['message' => 'Usuário ou senha inválidos'], 401);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao realizar login'], 500);
        }
    }

    public function register(Request $request)
    {
        $user = new Usuario();
        $user->nomeUsuario = $request->nomeUsuario;
        $user->senhaUsuario = bcrypt($request->senhaUsuario);

        try {
            $user->save();
            return response()->json(['message' => 'Usuário criado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar usuário'], 500);
        }
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout realizado com sucesso'], 200);
    }
}
