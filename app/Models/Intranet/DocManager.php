<?php

namespace App\Models\Intranet;

use App\Models\Intranet\Admin\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DocManager extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'doc_managers';

    protected $fillable = ['title', 'description', 'user_id', 'is_public', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentShares()
    {
        return $this->hasMany(DocumentShare::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
