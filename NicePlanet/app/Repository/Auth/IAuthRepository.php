<?php

namespace App\Repository\Auth;

use App\Models\Usuario;

interface IAuthRepository
{

    public function login(array $credetial);

    public function register(Usuario $user);
}
