<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAcuerdosCepsTable extends Migration
{
    public function up()
    {
        Schema::table('acuerdos_ceps', function (Blueprint $table) {
            $table->unsignedInteger('provincia_id');

            $table->foreign('provincia_id', 'provincia_fk_588235')->references('id')->on('provincia');

            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_588242')->references('id')->on('teams');
        });
    }
}
