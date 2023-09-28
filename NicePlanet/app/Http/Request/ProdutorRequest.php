<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProdutorRequest extends FormRequest
{

    // Regras de autorização de acesso
    public function authorize()
    {
        return true;
    }

    // Adiciona as regras de validações dos campos de Produtor
    public function rules()
    {
        return true;
    }
}
