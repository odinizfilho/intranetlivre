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
        Schema::create('fato_reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('user_id');
            $table->date('data_reserva');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->timestamps();
            
            $table->foreign('sala_id')->references('id')->on('d_salas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fato_reservas');
    }
};
