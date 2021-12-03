<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolo extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_bolos_id'];

    public function tipo_bolo(){
        return $this->belongsTo(TipoBolo::class);
    }

    protected $table = 'bolos';
}
