<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
use App\Models\User;
use App\Models\Category;

class Blog extends Model
{
    use Commentable;
    protected $fillable = ['title', 'content', 'image_path', 'user_id', 'created_at'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function link()
{
    // Aqui você pode construir a lógica para gerar o link do post
    // Pode ser uma combinação da rota, ID do post, slug, etc.

    // Exemplo básico usando a rota "blogs.show" do Laravel
    return route('posts.show', $this->id);
}
public function scopeLatestThree($query)
{
    return $query->orderBy('created_at', 'desc')->limit(3);
}

}