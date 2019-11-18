<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActasCepsTable extends Migration
{
    public function up()
    {
        Schema::table('actas_ceps', function (Blueprint $table) {
            $table->unsignedInteger('provincia_id')->nullable();

            $table->foreign('provincia_id', 'provincia_fk_588208')->references('id')->on('provincia');

            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_588216')->references('id')->on('teams');

            $table->unsignedInteger('vobo_id')->nullable();

            $table->foreign('vobo_id', 'vobo_fk_588298')->references('id')->on('users');
        });
    }
}
