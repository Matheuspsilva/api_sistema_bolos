<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolo extends Model
{
    use HasFactory;

    public function tipo_bolo(){
        return $this->belongsTo(TipoBolo::class);
    }

    protected $table = 'bolos';
}
