<?php

namespace App\Http\Controllers;

use App\Http\Request\AuthRequest;
use App\Services\Auth\IAuthService;
/**
 * @OA\PathItem(
 *     path="/api/login",
 * )
 */
class AuthController extends Controller
{

    private $service;

    public function __construct(IAuthService $service)
    {
        $this->service = $service;
    }


    /**
     * @OA\Post(
     *     path="/api/login",
     *     operationId="login",
     *     tags={"Autenticação"},
     *     summary="Faz login e retorna um token de acesso",
     *     security={{"Bearer":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Credenciais de login",
     *         @OA\JsonContent(
     *             required={"nomeUsuario", "senhaUsuario"},
     *             @OA\Property(property="nomeUsuario", type="string", example="tiago"),
     *             @OA\Property(property="senhaUsuario", type="string", example="12345678"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Token de acesso gerado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string", example="seu_token_de_acesso"),
     *             @OA\Property(property="token_type", type="string", example="Bearer"),
     *         ),
     *     ),
     *     @OA\Response(
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
            return response()->json(['message' => 'Erro ao realizar login', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/register",
     *     operationId="register",
     *     tags={"Autenticação"},
     *     summary="Cria um novo usuário",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados do novo usuário",
     *         @OA\JsonContent(
     *             required={"nomeUsuario", "senhaUsuario"},
     *             @OA\Property(property="nomeUsuario", type="string", example="novo_nome_de_usuario"),
     *             @OA\Property(property="senhaUsuario", type="string", example="nova_senha"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuário criado com sucesso",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro ao criar usuário",
     *     ),
     * )
     */
    public function register(AuthRequest $request)
    {
        try {
            $this->service->register($request);
            return response()->json(['message' => 'Usuário criado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar usuário', 'error' => $e->getMessage()], 500);
        }
    }
}
