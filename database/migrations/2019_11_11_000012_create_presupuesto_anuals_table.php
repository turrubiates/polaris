<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestoAnualsTable extends Migration
{
    public function up()
    {
        Schema::create('presupuesto_anuals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('periodo');

            $table->string('tipo')->nullable();

            $table->string('partida');

            $table->decimal('presupuestado_ene', 15, 2)->nullable();

            $table->decimal('presupuestado_feb', 15, 2)->nullable();

            $table->decimal('presupuestado_mar', 15, 2)->nullable();

            $table->decimal('presupuestado_abr', 15, 2)->nullable();

            $table->decimal('presupuestado_may', 15, 2)->nullable();

            $table->decimal('presupuestado_jun', 15, 2)->nullable();

            $table->decimal('presupuestado_jul', 15, 2)->nullable();

            $table->decimal('presupuestado_ago', 15, 2)->nullable();

            $table->decimal('presupuestado_sep', 15, 2)->nullable();

            $table->decimal('presupuestado_oct', 15, 2)->nullable();

            $table->decimal('presupuestado_nov', 15, 2)->nullable();

            $table->decimal('presupuestado_dic', 15, 2)->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
