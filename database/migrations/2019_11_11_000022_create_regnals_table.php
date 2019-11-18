<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegnalsTable extends Migration
{
    public function up()
    {
        Schema::create('regnals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cum')->nullable();

            $table->string('curp')->nullable();

            $table->string('nombre')->nullable();

            $table->string('apellido_paterno')->nullable();

            $table->string('apellido_materno')->nullable();

            $table->date('nacimiento')->nullable();

            $table->date('vigencia')->nullable();

            $table->string('sexo')->nullable();

            $table->string('ocupacion')->nullable();

            $table->string('email')->nullable();

            $table->string('telefono_particular')->nullable();

            $table->string('telefono_oficina')->nullable();

            $table->string('domicilio')->nullable();

            $table->string('colonia')->nullable();

            $table->string('municipio')->nullable();

            $table->string('estado')->nullable();

            $table->date('miembro_desde')->nullable();

            $table->string('provincia')->nullable();

            $table->string('distrito')->nullable();

            $table->string('grupo')->nullable();

            $table->string('localidad')->nullable();

            $table->string('seccion')->nullable();

            $table->string('cargo')->nullable();

            $table->string('religion')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
