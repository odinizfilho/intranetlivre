<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportLog extends Model
{
    protected $table = 'report_logs';

    protected $fillable = [
        'user_id',
        'report_id',
    ];

    // Relação com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relação com o relatório
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
