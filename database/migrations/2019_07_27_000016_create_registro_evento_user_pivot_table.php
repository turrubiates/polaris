<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroEventoUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('registro_evento_user', function (Blueprint $table) {
            $table->unsignedInteger('registro_evento_id');
            $table->foreign('registro_evento_id', 'registro_evento_id_fk_197329')->references('id')->on('registro_eventos');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_197329')->references('id')->on('users');
        });
    }
}
