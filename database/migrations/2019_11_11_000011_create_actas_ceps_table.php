<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasCepsTable extends Migration
{
    public function up()
    {
        Schema::create('actas_ceps', function (Blueprint $table) {
            $table->increments('id');

            $table->string('lugar')->nullable();

            $table->longText('orden_del_dia')->nullable();

            $table->longText('relatoria')->nullable();

            $table->string('numero_de_acta')->nullable();

            $table->date('fecha_de_convocatoria')->nullable();

            $table->date('fecha_de_acta')->nullable();

            $table->time('hora_inicio')->nullable();

            $table->time('hora_fin')->nullable();

            $table->longText('observaciones')->nullable();

            $table->datetime('finished_at')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
