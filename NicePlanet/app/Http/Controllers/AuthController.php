<?php

namespace App\Http\Controllers;

use App\Http\Request\AuthRequest;
use App\Services\Auth\IAuthService;

class AuthController extends Controller
{
    private $service;

    public function __construct(IAuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @SWG\Post(
     *     path="/api/login",
     *     operationId="login",
     *     tags={"Autenticação"},
     *     summary="Faz login e retorna um token de acesso",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         required=true,
     *         @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                 property="nomeUsuario",
     *                 type="string",
     *                 example="seu_nome_de_usuario",
     *             ),
     *             @SWG\Property(
     *                 property="senhaUsuario",
     *                 type="string",
     *                 example="sua_senha",
     *             ),
     *         ),
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Token de acesso gerado com sucesso",
     *         @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                 property="access_token",
     *                 type="string",
     *                 example="seu_token_de_acesso",
     *             ),
     *             @SWG\Property(
     *                 property="token_type",
     *                 type="string",
     *                 example="Bearer",
     *             ),
     *         ),
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Credenciais inválidas",
     *     ),
     * )
     */
    public function login(AuthRequest $request)
    {
        try {
            return $this->service->login($request);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao realizar login', $e->getMessage()], 500);
        }
    }

    public function register(AuthRequest $request)
    {
        try {
            $this->service->register($request);
            return response()->json(['message' => 'Usuário criado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar usuário'], 500);
        }
    }


    public function logout()
    {
        try {
            $result = $this->service->logout();
            return response()->json([
                'message' => 'Logout realizado com sucesso',
                'user' => $result,
            ], 200);          }
        catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao realizar logout', $e->getMessage()], 500);
        }
    }
}
