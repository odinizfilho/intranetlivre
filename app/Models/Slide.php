<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'fato_slides';
    protected $fillable = [
        'image_url',
        'title',
        'display_order',
        'link_url',
        'slide_type',
        'start_date',
        'end_date',
        'is_active',
        'created_by',
    ];

    protected $dates = ['start_date', 'end_date'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
