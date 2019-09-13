<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1564073419998ListaDeEventosTable extends Migration
{
    public function up()
    {
        Schema::table('lista_de_eventos', function (Blueprint $table) {
            $table->string('nivel');
            $table->string('participantes');
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
        });
    }

    public function down()
    {
        Schema::table('lista_de_eventos', function (Blueprint $table) {
        });
    }
}
