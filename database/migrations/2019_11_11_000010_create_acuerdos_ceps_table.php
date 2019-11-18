<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosCepsTable extends Migration
{
    public function up()
    {
        Schema::create('acuerdos_ceps', function (Blueprint $table) {
            $table->increments('id');

            $table->string('numero_de_acuerdo')->nullable();

            $table->string('descripcion_de_acuerdo');

            $table->date('fecha');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
