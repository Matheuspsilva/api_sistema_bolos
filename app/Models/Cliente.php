<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Cliente extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['nome', 'email'];

    public function lista_interesses(){
        return $this->hasMany(ListaInteresse::class, 'clientes_id');
    }
}
