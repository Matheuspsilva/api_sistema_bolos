<?php

use App\Models\TipoBolo;
use App\Models\Cliente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaInteressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_interesses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cliente::class, 'clientes_id')->constrained();
            $table->foreignIdFor(TipoBolo::class, 'tipo_bolos_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_interesses');
    }
}
