<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtor extends Model
{
    protected $fillable = ['id', 'nomeProdutor', 'cpfProdutor'];

    protected $table = 'produtor';

}
