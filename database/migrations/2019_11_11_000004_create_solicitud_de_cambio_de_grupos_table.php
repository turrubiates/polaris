<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudDeCambioDeGruposTable extends Migration
{
    public function up()
    {
        Schema::create('solicitud_de_cambio_de_grupos', function (Blueprint $table) {
            $table->increments('id');

            $table->date('fecha_de_solicitud');

            $table->string('solicitante');

            $table->string('grupo_saliente');

            $table->string('grupo_entrante');

            $table->string('observaciones_de_grupo_saliente')->nullable();

            $table->date('fecha_de_cambio')->nullable();

            $table->string('cambio_realizado_por')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
