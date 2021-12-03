<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaInteresse extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_bolos_id', 'clientes_id'];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    public function tipo_bolo(){
        return $this->belongsTo(TipoBolo::class, 'tipo_bolos_id');
    }
}
