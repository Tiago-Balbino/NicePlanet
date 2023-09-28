<?php

namespace App\Services\Auth;

use App\Http\Request\AuthRequest;

interface IAuthService
{

    public function login(AuthRequest $request);

    public function register(AuthRequest $request);

    public function logout();
}
