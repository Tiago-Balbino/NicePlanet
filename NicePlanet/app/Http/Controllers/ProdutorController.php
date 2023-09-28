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

    public function create(ProdutorRequest $request)
    {
        return $this->service->create($request);
    }

}
