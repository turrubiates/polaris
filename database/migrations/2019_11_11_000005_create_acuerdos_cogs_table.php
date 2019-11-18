<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosCogsTable extends Migration
{
    public function up()
    {
        Schema::create('acuerdos_cogs', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fecha');

            $table->string('numero_de_acuerdo')->nullable();

            $table->string('descripcion_de_acuerdo');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
