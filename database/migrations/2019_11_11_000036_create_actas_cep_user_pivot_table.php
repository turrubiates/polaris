<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasCepUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actas_cep_user', function (Blueprint $table) {
            $table->unsignedInteger('actas_cep_id');

            $table->foreign('actas_cep_id', 'actas_cep_id_fk_588211')->references('id')->on('actas_ceps')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_588211')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
