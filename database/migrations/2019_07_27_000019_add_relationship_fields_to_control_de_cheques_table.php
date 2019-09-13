<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToControlDeChequesTable extends Migration
{
    public function up()
    {
        Schema::table('control_de_cheques', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_89016')->references('id')->on('teams');
        });
    }
}
