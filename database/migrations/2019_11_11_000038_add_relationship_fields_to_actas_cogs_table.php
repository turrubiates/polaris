<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActasCogsTable extends Migration
{
    public function up()
    {
        Schema::table('actas_cogs', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_588423')->references('id')->on('teams');

            $table->unsignedInteger('provincia_id')->nullable();

            $table->foreign('provincia_id', 'provincia_fk_588426')->references('id')->on('provincia');

            $table->unsignedInteger('vobo_id')->nullable();

            $table->foreign('vobo_id', 'vobo_fk_588435')->references('id')->on('users');

            $table->unsignedInteger('grupo_id')->nullable();

            $table->foreign('grupo_id', 'grupo_fk_588494')->references('id')->on('grupos');
        });
    }
}
