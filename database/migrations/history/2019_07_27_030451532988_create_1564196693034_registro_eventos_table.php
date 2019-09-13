<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1564196693034RegistroEventosTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('registro_eventos')) {
            Schema::create('registro_eventos', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('grupo_id');
                $table->foreign('grupo_id', 'grupo_fk_197328')->references('id')->on('grupos');
                $table->unsignedInteger('costo_id')->nullable();
                $table->foreign('costo_id', 'costo_fk_197330')->references('id')->on('lista_de_eventos');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('registro_eventos');
    }
}
