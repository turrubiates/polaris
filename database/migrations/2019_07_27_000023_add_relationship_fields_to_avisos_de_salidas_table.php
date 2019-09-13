<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAvisosDeSalidasTable extends Migration
{
    public function up()
    {
        Schema::table('avisos_de_salidas', function (Blueprint $table) {
            $table->unsignedInteger('evento_id');
            $table->foreign('evento_id', 'evento_fk_89326')->references('id')->on('lista_de_eventos');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_89330')->references('id')->on('teams');
            $table->unsignedInteger('grupo_id');
            $table->foreign('grupo_id', 'grupo_fk_89645')->references('id')->on('grupos');
        });
    }
}
