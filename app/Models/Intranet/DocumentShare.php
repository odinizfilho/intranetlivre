<?php

namespace App\Models\Intranet;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentShare extends Model
{
    protected $table = 'document_shares';

    use HasFactory;

    protected $fillable = ['document_id', 'user_id'];

    public function document()
    {
        return $this->belongsTo(DocManager::class, 'document_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
