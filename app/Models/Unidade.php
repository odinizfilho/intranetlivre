<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'd_unidade'; // Nome da tabela no banco de dados

    protected $primaryKey = 'cod_unidade'; // Chave primária da tabela

    public $timestamps = false; // Define se a tabela possui colunas "created_at" e "updated_at"

    // Defina os campos da tabela que podem ser preenchidos em massa (mass assignable)
    protected $fillable = [
        'nome_unidade',
        'endereco',
        // Adicione outros campos aqui
    ];

    // Se você tiver relacionamentos com outras tabelas, defina-os aqui
    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class, 'cod_unidade');
    }
}
