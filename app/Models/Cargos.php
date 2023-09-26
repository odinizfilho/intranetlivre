<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'd_cargos';

    protected $primaryKey = 'cod_cargo';

    protected $fillable = [
        'nome',
        // Outros campos do modelo
    ];

    // Relacionamento com colaboradores
    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'cod_cargo');
    }
}
