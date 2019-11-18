<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToListaDeEventosTable extends Migration
{
    public function up()
    {
        Schema::table('lista_de_eventos', function (Blueprint $table) {
            $table->unsignedInteger('responsable_de_evento_id');

            $table->foreign('responsable_de_evento_id', 'responsable_de_evento_fk_586785')->references('id')->on('users');
        });
    }
}
