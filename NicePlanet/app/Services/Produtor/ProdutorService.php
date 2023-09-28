<?php

namespace App\Services\Produtor;

use App\Repository\Produtor\IProdutorRepository;

class ProdutorService implements IProdutorService
{
    private $repository;

    public function __construct(IProdutorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        try {
            $data = $request->all();

            return $this->repository->create($data);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
