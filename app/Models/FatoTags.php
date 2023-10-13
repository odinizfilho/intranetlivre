<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FatoTags extends Model
{
    use HasFactory;

    protected $table = 'fato_tags'; // Substitua pelo nome real da tabela, se for diferente do padrão

    // Defina as colunas da tabela que podem ser preenchidas em massa
    protected $fillable = [
        'nome',
        // Adicione outras colunas conforme necessário
    ];
}
