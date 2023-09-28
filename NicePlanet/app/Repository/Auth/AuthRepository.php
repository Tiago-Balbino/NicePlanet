<?php

namespace App\Repository\Auth;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements IAuthRepository
{

    public function login(array $credetial)
    {
        $usuario = Usuario::where('nomeUsuario', $credetial['nomeUsuario'])->firstOrFail();

        if (!$usuario || !Hash::check($credetial['senhaUsuario'], $usuario->senhaUsuario)) {
            return response()->json([
                'message' => 'Credenciais inválidas'
            ], 401);
        }

        return $usuario->createToken($usuario->nomeUsuario)->plainTextToken;
    }

    public function register(Usuario $user)
    {
       return $user->save();
    }
}
