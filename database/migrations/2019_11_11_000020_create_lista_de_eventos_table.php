<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaDeEventosTable extends Migration
{
    public function up()
    {
        Schema::create('lista_de_eventos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre_de_evento');

            $table->string('lugar_de_evento')->nullable();

            $table->datetime('inicio_de_evento');

            $table->datetime('fin_de_evento');

            $table->string('costo');

            $table->date('fecha_de_pago_1')->nullable();

            $table->decimal('costo_participantes_fecha_1', 15, 2)->nullable();

            $table->integer('referencia_de_pago')->nullable();

            $table->string('nivel');

            $table->string('adultos_responsables')->nullable();

            $table->string('staff')->nullable();

            $table->decimal('costo_adultos_fecha_1', 15, 2)->nullable();

            $table->decimal('costo_staff_fecha_1', 15, 2)->nullable();

            $table->date('fecha_de_pago_2')->nullable();

            $table->decimal('costo_participantes_fecha_2', 15, 2)->nullable();

            $table->decimal('costo_adultos_fecha_2', 15, 2)->nullable();

            $table->decimal('costo_staff_fecha_2', 15, 2)->nullable();

            $table->date('fecha_de_pago_3')->nullable();

            $table->decimal('costo_participantes_fecha_3', 15, 2)->nullable();

            $table->decimal('costo_adultos_fecha_3', 15, 2)->nullable();

            $table->decimal('costo_staff_fecha_3', 15, 2)->nullable();

            $table->string('participantes');

            $table->boolean('participantes_ml')->default(0)->nullable();

            $table->boolean('participantes_ts')->default(0)->nullable();

            $table->boolean('participantes_cc')->default(0)->nullable();

            $table->boolean('participantes_cr')->default(0)->nullable();

            $table->boolean('participantes_sd')->default(0)->nullable();

            $table->boolean('participantes_ai')->default(0)->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
