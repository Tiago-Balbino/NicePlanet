<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    //Cria a tabela de usuário
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nomeUsuario')->unique();
            $table->string('senhaUsuario');
            $table->timestamps();
        });
    }


    //Deleta a tabela de usuário
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
