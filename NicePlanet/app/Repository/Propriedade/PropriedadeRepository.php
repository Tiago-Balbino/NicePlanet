<?php

namespace App\Repository\Propriedade;

use App\Models\Propriedade;

class PropriedadeRepository implements IPropriedadeRepository
{

    protected $entity;

    public function __construct(Propriedade $entity)
    {
        $this->entity = $entity;
    }

    // Cria um novo registro
    public function create($data)
    {
        return $this->entity->create($data);
    }


    // Retorna o primeiro elemento que encontrar com o id passado
    public function getId($id)
    {
        return $this->entity->where('id', $id)->first();
    }
}
