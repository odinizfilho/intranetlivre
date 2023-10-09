<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'd_setores';

    

    protected $fillable = [
        'nome', 'cod_setor'
        // Outros campos do modelo
    ];

    // Relacionamento com colaboradores
    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'cod_setor');
    }
}
