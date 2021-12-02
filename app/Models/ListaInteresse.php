<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaInteresse extends Model
{
    use HasFactory;

    public function cliente(){
        return $this->hasOne(Cliente::class);
    }

    public function tipo_bolo(){
        return $this->hasOne(TipoBolo::class);
    }
}
