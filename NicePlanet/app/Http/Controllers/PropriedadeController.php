<?php

namespace App\Http\Controllers;

use App\Http\Request\PropriedadeRequest;
use App\Services\Propriedade\IPropriedadeService;
use Illuminate\Routing\Controller as BaseController;


class PropriedadeController extends BaseController
{
    private $service;

    public function __construct(IPropriedadeService $service)
    {
        $this->service = $service;
    }


    /**
     * @OA\Post(
     *     path="/api/propriedade",
     *     operationId="createPropriedade",
     *     tags={"Propriedade"},
     *     summary="Cria uma nova propriedade",
     *     security={{"Bearer": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados da propriedade a serem criados",
     *         @OA\JsonContent(
     *             required={"nomePropriedade", "cadastroRural"},
     *             @OA\Property(property="nomePropriedade", type="string"),
     *             @OA\Property(property="cadastroRural", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Propriedade criada com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Propriedade criada com sucesso"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="nomePropriedade", type="string"),
     *                 @OA\Property(property="cadastroRural", type="string"),
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Erro de validação",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Erro de validação"),
     *             @OA\Property(property="errors", type="object",
     *                 @OA\Property(property="nomePropriedade", type="array",
     *                     @OA\Items(type="string", example="O campo nomePropriedade é obrigatório.")
     *                 ),
     *                 @OA\Property(property="cadastroRural", type="array",
     *                     @OA\Items(type="string", example="O campo cadastroRural é obrigatório.")
     *                 ),
     *             ),
     *         )
     *     )
     * )
     */
    public function create(PropriedadeRequest $request)
    {
        return $this->service->create($request);
    }


    /**
     * @OA\Get(
     *     path="/api/propriedade/{id}",
     *     operationId="getPropriedadeById",
     *     tags={"Propriedade"},
     *     summary="Obtém uma propriedade por ID",
     *     security={{"Bearer": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID da propriedade",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Propriedade encontrada",
     *         @OA\JsonContent(
     *             @OA\Property(property="nomePropriedade", type="string"),
     *             @OA\Property(property="cadastroRural", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Não autorizado"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Propriedade não encontrada"
     *     )
     * )
     */
    public function getId($id) {
        return $this->service->getId($id);
    }
}
