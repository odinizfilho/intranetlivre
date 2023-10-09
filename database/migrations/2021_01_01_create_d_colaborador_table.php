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
            $table->string('matricula')->unique();
            $table->string('cod_unidade');
            $table->date('data_nascimento');
            $table->string('telefone');
            $table->string('ramal')->nullable();
            $table->string('cod_cargo');
			$table->string('cod_setor');
            $table->date('data_admissao');
            $table->string('matricula_gestor');
            
       
            
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
