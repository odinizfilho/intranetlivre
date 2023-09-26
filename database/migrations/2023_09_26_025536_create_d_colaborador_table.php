<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    

    public function up(): void
{
    if (!Schema::hasTable('d_colaborador')) {
        Schema::create('d_colaborador', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cpf_colaborador')->unique();
            $table->foreignId('cod_unidade');
            $table->date('data_nascimento');
            $table->string('telefone');
            $table->string('ramal')->nullable();
            $table->foreignId('cod_cargo');
            $table->date('data_admissao');
            $table->foreignId('cpf_gestor');
            
            $table->foreign('cpf_colaborador')->references('cpf')->on('users');
            $table->foreign('cod_unidade')->references('cod_unidade')->on('d_unidade');
            $table->foreign('cod_cargo')->references('cod_cargo')->on('d_cargos');
            $table->foreign('cpf_gestor')->references('cpf')->on('users');
            
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_colaborador');
    }
};
