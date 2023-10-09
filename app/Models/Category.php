<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the users associated with the category.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
