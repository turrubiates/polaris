<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosBancariosTable extends Migration
{
    public function up()
    {
        Schema::create('movimientos_bancarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_de_cuenta');
            $table->date('fecha_de_operacion');
            $table->string('descripcion')->nullable();
            $table->string('codigo_de_transaccion')->nullable();
            $table->integer('sucursal')->nullable();
            $table->decimal('depositos', 15, 2)->nullable();
            $table->decimal('retiros', 15, 2)->nullable();
            $table->decimal('saldo', 15, 2)->nullable();
            $table->integer('numero_de_movimiento');
            $table->string('descripcion_detallada')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
