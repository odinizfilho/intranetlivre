<?php

namespace App\Models\Intranet;

use App\Models\Intranet\Admin\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Post extends Model implements HasMedia
{
    use Commentable;
    use HasFactory;
    use InteractsWithMedia;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title', 'content', 'slug', 'user_id', 'category_id', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
