<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPresupuestoAnualsTable extends Migration
{
    public function up()
    {
        Schema::table('presupuesto_anuals', function (Blueprint $table) {
            $table->unsignedInteger('provincia_id');

            $table->foreign('provincia_id', 'provincia_fk_588034')->references('id')->on('provincia');
        });
    }
}
