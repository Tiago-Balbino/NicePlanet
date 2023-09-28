<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $fillable = [
        'nomeUsuario',
        'senhaUsuario',
    ];

    protected $password = 'senhaUsuario';

    protected $hidden = ['senhaUsuario'];

}
