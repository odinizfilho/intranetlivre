<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = 'd_colaborador';

    protected $fillable = [
        'matricula',
        'cod_unidade',
        'data_nascimento',
        'telefone',
        'ramal',
        'cod_cargo',
        'data_admissao',
        'matricula_gestor',
    ];

    // Relacionamento com a tabela 'users' para o CPF do colaborador e do gestor
    public function user()
    {
        return $this->belongsTo(User::class, 'matricula', 'matricula');
    }

    // Outros relacionamentos e métodos podem ser adicionados aqui conforme necessário
}
