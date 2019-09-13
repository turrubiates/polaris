<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMovimientosBancariosTable extends Migration
{
    public function up()
    {
        Schema::table('movimientos_bancarios', function (Blueprint $table) {
            $table->unsignedInteger('referencia_id')->nullable();
            $table->foreign('referencia_id', 'referencia_fk_89187')->references('id')->on('lista_de_eventos');
            $table->unsignedInteger('cheque_id')->nullable();
            $table->foreign('cheque_id', 'cheque_fk_89196')->references('id')->on('control_de_cheques');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_89200')->references('id')->on('teams');
        });
    }
}
