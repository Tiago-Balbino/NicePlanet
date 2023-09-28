<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propriedade extends Model
{
    protected $fillable = ['id', 'nomePropriedade', 'cadastroRural'];

    protected $table = 'propriedade';

}
