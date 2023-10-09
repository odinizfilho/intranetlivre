<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Report extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sharedWithUser(User $user)
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'report_user', 'report_id', 'user_id');
    }
}
