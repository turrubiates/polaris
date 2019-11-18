<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('email')->nullable();

            $table->datetime('email_verified_at')->nullable();

            $table->string('password')->nullable();

            $table->string('remember_token')->nullable();

            $table->string('cum')->nullable()->unique();

            $table->string('apellido_materno')->nullable();

            $table->string('curp')->nullable();

            $table->date('nacimiento')->nullable();

            $table->date('vigencia')->nullable();

            $table->string('apellido_paterno')->nullable();

            $table->string('sexo')->nullable();

            $table->string('ocupacion')->nullable();

            $table->date('miembro_desde')->nullable();

            $table->string('telefono_particular')->nullable();

            $table->string('telefono_oficina')->nullable();

            $table->string('domicilio')->nullable();

            $table->string('colonia')->nullable();

            $table->string('municipio')->nullable();

            $table->string('estado')->nullable();

            $table->string('religion')->nullable();

            $table->string('provincia')->nullable();

            $table->string('distrito')->nullable();

            $table->string('grupo')->nullable();

            $table->string('localidad')->nullable();

            $table->string('seccion')->nullable();

            $table->string('cargo')->nullable();

            $table->timestamps();
        });
    }
}
