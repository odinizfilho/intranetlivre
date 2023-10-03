<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'd_cargos';

    

    protected $fillable = [
        'nome', 'cod_cargo'
        // Outros campos do modelo
    ];

    // Relacionamento com colaboradores
    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'cod_cargo');
    }
}
