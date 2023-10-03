<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Unidade extends Model
{
    protected $table = 'd_unidade'; // Nome da tabela no banco de dados

    public $timestamps = true; // Define se a tabela possui colunas "created_at" e "updated_at"

    // Defina os campos da tabela que podem ser preenchidos em massa (mass assignable)
    protected $fillable = [
        'cod_unidade',
        'nome',
        'descricao',
        'endereco',
        'cep',
        'telefone',
        'email',
        'latitude',
        'longitude'

    ];

    // Se você tiver relacionamentos com outras tabelas, defina-os aqui
    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'cod_unidade');
    }

    
}