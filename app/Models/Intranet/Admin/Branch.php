<?php

namespace App\Models\Intranet\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'phone',
    ];
}
