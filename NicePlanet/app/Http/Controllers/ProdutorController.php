<?php

namespace App\Http\Controllers;

use App\Http\Request\ProdutorRequest;
use App\Services\Produtor\IProdutorService;
use Illuminate\Routing\Controller as BaseController;

class ProdutorController extends BaseController
{
    private $service;

    public function __construct(IProdutorService $service)
    {
        $this->service = $service;
    }


    /**
     * @OA\Post(
     *     path="/api/produtor",
     *     operationId="createProdutor",
     *     tags={"Produtor"},
     *     summary="Cria um novo produtor",
     *     security={{"Bearer":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados do produtor a serem criados",
     *         @OA\JsonContent(
     *             required={"nomeProdutor", "cpfProdutor"},
     *             @OA\Property(property="nomeProdutor", type="string"),
     *             @OA\Property(property="cpfProdutor", type="string", format="regex", pattern="^\d{11}$"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Produtor criado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Produtor criado com sucesso"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="nomeProdutor", type="string"),
     *                 @OA\Property(property="cpfProdutor", type="string", format="regex", pattern="^\d{11}$"),
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Erro de validação",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Erro de validação"),
     *             @OA\Property(property="errors", type="object",
     *                 @OA\Property(property="nomeProdutor", type="array",
     *                     @OA\Items(type="string", example="O campo nomeProdutor é obrigatório.")
     *                 ),
     *                 @OA\Property(property="cpfProdutor", type="array",
     *                     @OA\Items(type="string", example="O campo cpfProdutor deve ter 11 dígitos.")
     *                 ),
     *             ),
     *         )
     *     )
     * )
     */
    public function create(ProdutorRequest $request)
    {
        return $this->service->create($request);
    }


    /**
     * @OA\Get(
     *     path="/api/produtor/{id}",
     *     operationId="getProdutorById",
     *     tags={"Produtor"},
     *     summary="Obtém um produtor por ID",
     *     security={{"Bearer": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do produtor",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Produtor encontrado",
     *         @OA\JsonContent(
     *             @OA\Property(property="nomeProdutor", type="string"),
     *             @OA\Property(property="cpfProdutor", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Não autorizado"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Produtor não encontrado"
     *     )
     * )
     */
    public function getId($id) {
        return $this->service->getId($id);
    }


}
