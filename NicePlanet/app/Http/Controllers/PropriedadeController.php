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

    public function create(PropriedadeRequest $request)
    {
        return $this->service->create($request);
    }

    public function getId($id) {
        return $this->service->getId($id);
    }
}
