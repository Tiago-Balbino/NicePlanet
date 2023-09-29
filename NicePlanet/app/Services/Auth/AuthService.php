<?php

namespace App\Services\Auth;

use App\Http\Request\AuthRequest;
use App\Models\Usuario;
use App\Repository\Auth\IAuthRepository;

class AuthService implements IAuthService
{
    private $repository;

    public function __construct(IAuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function login(AuthRequest $request)
    {
        $credetial = $request->only('nomeUsuario', 'senhaUsuario');

        return $this->repository->login($credetial);

    }

    public function register(AuthRequest $request)
    {
        $user = new Usuario();
        $user->nomeUsuario = $request->nomeUsuario;
        $user->senhaUsuario = bcrypt($request->senhaUsuario);

        return $this->repository->register($user);
    }
}
