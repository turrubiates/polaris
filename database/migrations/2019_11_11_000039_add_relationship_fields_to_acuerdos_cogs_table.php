<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAcuerdosCogsTable extends Migration
{
    public function up()
    {
        Schema::table('acuerdos_cogs', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_588441')->references('id')->on('teams');

            $table->unsignedInteger('provincia_id');

            $table->foreign('provincia_id', 'provincia_fk_588443')->references('id')->on('provincia');
        });
    }
}
