<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DSala extends Model
{
    use HasFactory;

    protected $table = 'd_salas';

    protected $fillable = [
        'nome',
        'capacidade',
        'descricao',
    ];

    // Relacionamento com as reservas (tabela de fatos)
    public function reservas()
    {
        return $this->hasMany(FatoReserva::class, 'sala_id', 'id');
    }
}


