<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGruposTable extends Migration
{
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->unsignedInteger('provincia_id');
            $table->foreign('provincia_id', 'provincia_fk_88839')->references('id')->on('provincia');
        });
    }
}
