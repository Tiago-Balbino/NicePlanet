<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{

    // Regras de autorização de acesso
    public function authorize()
    {
        return true;
    }

    // Adiciona as regras de validações dos campos
    public function rules()
    {
        return [
            'nomeUsuario' => ['required', 'max:255'],
            'senhaUsuario' => ['required', 'min:8', 'max:255']
        ];
    }

}
