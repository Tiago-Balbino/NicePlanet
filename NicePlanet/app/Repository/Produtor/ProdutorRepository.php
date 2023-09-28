<?php

namespace App\Repository\Produtor;

use App\Models\Produtor;

class ProdutorRepository implements IProdutorRepository
{

    protected $entity;

    public function __construct(Produtor $entity)
    {
        $this->entity = $entity;
    }

    public function create($data)
    {
        return $this->entity->create($data);
    }
}
