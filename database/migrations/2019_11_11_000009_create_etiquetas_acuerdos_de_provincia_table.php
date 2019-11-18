<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetasAcuerdosDeProvinciaTable extends Migration
{
    public function up()
    {
        Schema::create('etiquetas_acuerdos_de_provincia', function (Blueprint $table) {
            $table->increments('id');

            $table->string('etiqueta_acuerdo_de_provincia');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
