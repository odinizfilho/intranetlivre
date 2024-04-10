<?php

namespace App\Models\Intranet\Admin;

use App\Models\Intranet\DocManager;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $table = 'categories';

    protected $fillable = ['name', 'description', 'slug'];

    // Se você quiser especificar o nome da tabela, pode fazê-lo assim:
    // protected $table = 'categories';

    // Relacionamento um-para-muitos com os documentos
    public function documents()
    {
        return $this->hasMany(DocManager::class);
    }
}
