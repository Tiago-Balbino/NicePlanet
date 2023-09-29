<?php

namespace App\Services\Propriedade;

use App\Http\Request\PropriedadeRequest;

interface IPropriedadeService
{

    public function create(PropriedadeRequest $request);

    public function getId($id);
}
