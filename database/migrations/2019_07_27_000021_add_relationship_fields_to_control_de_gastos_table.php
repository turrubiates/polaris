<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToControlDeGastosTable extends Migration
{
    public function up()
    {
        Schema::table('control_de_gastos', function (Blueprint $table) {
            $table->unsignedInteger('cheque_id')->nullable();
            $table->foreign('cheque_id', 'cheque_fk_89018')->references('id')->on('control_de_cheques');
            $table->unsignedInteger('evento_id')->nullable();
            $table->foreign('evento_id', 'evento_fk_89020')->references('id')->on('lista_de_eventos');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_89030')->references('id')->on('teams');
        });
    }
}
