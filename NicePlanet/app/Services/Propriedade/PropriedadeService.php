<?php

namespace App\Services\Propriedade;

use App\Http\Request\PropriedadeRequest;
use App\Repository\Propriedade\IPropriedadeRepository;

class PropriedadeService implements IPropriedadeService
{

    private $repository;

    public function __construct(IPropriedadeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(PropriedadeRequest $request)
    {
        try {
            $data = $request->all();

            return $this->repository->create($data);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getId($id)
    {
        try {
            return $this->repository->getId($id);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
