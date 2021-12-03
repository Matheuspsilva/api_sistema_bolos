<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBolo extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'peso'];

    public function bolos(){
        return $this->hasMany(Bolo::class);
    }

    public function lista_interesses(){
        return $this->hasMany(ListaInteresse::class);
    }

    protected $table = 'tipo_bolos';
}
