<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PropriedadeRequest extends FormRequest
{

    // Regras de autorização de acesso
    public function authorize()
    {
        return true;
    }

    // Adiciona as regras de validações dos campos de Propriedade
    public function rules()
    {
        return [
            'nomePropriedade' => 'required|string',
            'cadastroRural' => 'required|string',
        ];
    }
}
