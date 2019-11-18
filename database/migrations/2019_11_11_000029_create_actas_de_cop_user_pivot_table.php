<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasDeCopUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actas_de_cop_user', function (Blueprint $table) {
            $table->unsignedInteger('actas_de_cop_id');

            $table->foreign('actas_de_cop_id', 'actas_de_cop_id_fk_588404')->references('id')->on('actas_de_cops')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_588404')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
