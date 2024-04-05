<?php

namespace App\Models\Intranet\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apps extends Model
{
    use HasFactory;

    protected $table = 'admin_apps';
    protected $fillable = [
        'name',
        'image_url',
        'app_link',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}