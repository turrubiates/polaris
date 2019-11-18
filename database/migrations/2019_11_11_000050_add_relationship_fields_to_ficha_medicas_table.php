<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFichaMedicasTable extends Migration
{
    public function up()
    {
        Schema::table('ficha_medicas', function (Blueprint $table) {
            $table->unsignedInteger('miembro_id');

            $table->foreign('miembro_id', 'miembro_fk_586720')->references('id')->on('users');
        });
    }
}
