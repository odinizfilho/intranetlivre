<?php

namespace App\Models\Intranet\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class IntranetConfig extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'intranet_config';

    protected $fillable = [
        'titulo',
        'logo',
        'cnpj',
        'cep',
        'endereco',
        'link',
    ];
}
