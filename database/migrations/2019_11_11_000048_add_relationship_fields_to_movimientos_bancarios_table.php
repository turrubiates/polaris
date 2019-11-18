<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMovimientosBancariosTable extends Migration
{
    public function up()
    {
        Schema::table('movimientos_bancarios', function (Blueprint $table) {
            $table->unsignedInteger('cheque_id')->nullable();

            $table->foreign('cheque_id', 'cheque_fk_587958')->references('id')->on('control_de_cheques');
        });
    }
}
