<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propiedade extends Model
{
    protected $fillable = ['id', 'nomePropriedade', 'cpfPropriedade'];

    protected $table = 'propiedade';

}
