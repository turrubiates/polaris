<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisosDeSalidaUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('avisos_de_salida_user', function (Blueprint $table) {
            $table->unsignedInteger('avisos_de_salida_id');
            $table->foreign('avisos_de_salida_id', 'avisos_de_salida_id_fk_89331')->references('id')->on('avisos_de_salidas');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_89331')->references('id')->on('users');
        });
    }
}
