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

            $table->foreign('cheque_id', 'cheque_fk_588110')->references('id')->on('control_de_cheques');
        });
    }
}
