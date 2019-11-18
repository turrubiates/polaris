<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActasDeCopsTable extends Migration
{
    public function up()
    {
        Schema::table('actas_de_cops', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_588394')->references('id')->on('teams');

            $table->unsignedInteger('provincia_id')->nullable();

            $table->foreign('provincia_id', 'provincia_fk_588397')->references('id')->on('provincia');

            $table->unsignedInteger('vobo_id')->nullable();

            $table->foreign('vobo_id', 'vobo_fk_588406')->references('id')->on('users');
        });
    }
}
