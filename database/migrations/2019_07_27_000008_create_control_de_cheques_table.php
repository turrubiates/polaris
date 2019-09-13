<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlDeChequesTable extends Migration
{
    public function up()
    {
        Schema::create('control_de_cheques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_de_cheque');
            $table->string('nombre_a_quien_se_expide');
            $table->decimal('cantidad', 15, 2);
            $table->string('descripcion');
            $table->date('fecha_de_expedicion');
            $table->date('fecha_de_entrega')->nullable();
            $table->string('nombre_a_quien_se_entrego')->nullable();
            $table->date('fecha_de_cobro')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
