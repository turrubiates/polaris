<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRegistroEventosTable extends Migration
{
    public function up()
    {
        Schema::table('registro_eventos', function (Blueprint $table) {
            $table->unsignedInteger('grupo_id');

            $table->foreign('grupo_id', 'grupo_fk_586554')->references('id')->on('grupos');

            $table->unsignedInteger('evento_id');

            $table->foreign('evento_id', 'evento_fk_586724')->references('id')->on('lista_de_eventos');
        });
    }
}
