<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FatoTags;

class FatoDocumento extends Model
{
    use HasFactory;

    protected $table = 'fato_documentos'; // Nome da tabela no banco de dados (se diferente do padrão)

    // Defina as colunas da tabela que podem ser preenchidas em massa
    protected $fillable = [
        'nome',
        'caminho',
        // Adicione outras colunas conforme necessário
    ];

    // Relacionamento com a tabela de tags (muitos para muitos)
    public function tags()
    {
        return $this->belongsToMany(FatoTags::class, 'documento_tag', 'documento_id', 'tag_id');
    }
}
