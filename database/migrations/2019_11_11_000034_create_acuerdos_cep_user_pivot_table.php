<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosCepUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('acuerdos_cep_user', function (Blueprint $table) {
            $table->unsignedInteger('acuerdos_cep_id');

            $table->foreign('acuerdos_cep_id', 'acuerdos_cep_id_fk_588238')->references('id')->on('acuerdos_ceps')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_588238')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
