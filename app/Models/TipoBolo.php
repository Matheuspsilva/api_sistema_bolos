<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBolo extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'peso'];

    public function bolos(){
        return $this->hasMany(Bolo::class, 'tipo_bolos_id');
    }

    public function lista_interesses(){
        return $this->hasMany(ListaInteresse::class, 'tipo_bolos_id');
    }

    protected $table = 'tipo_bolos';
}
