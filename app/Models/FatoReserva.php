<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class FatoReserva extends Model
{

    use HasFactory;

    protected $table = 'fato_reservas';

    protected $fillable = [
        'sala_id',
        'user_id',
        'data_reserva',
        'hora_inicio',
        'hora_fim',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function link()
{
    // Aqui você pode construir a lógica para gerar o link do post
    // Pode ser uma combinação da rota, ID do post, slug, etc.

    // Exemplo básico usando a rota "blogs.show" do Laravel
    return route('reservas.show', $this->id);
}
    // Relacionamento com a sala de dimensão
    public function sala()
    {
        return $this->belongsTo(DSala::class, 'sala_id', 'id');
    }

    // Relacionamento com o usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
