<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1564199686026RegistroEventosTable extends Migration
{
    public function up()
    {
        Schema::table('registro_eventos', function (Blueprint $table) {
            $table->dropForeign('costo_fk_197330');
            $table->dropColumn('costo_id');
        });
        Schema::table('registro_eventos', function (Blueprint $table) {
            $table->unsignedInteger('evento_id');
            $table->foreign('evento_id', 'evento_fk_197337')->references('id')->on('lista_de_eventos');
        });
    }

    public function down()
    {
        Schema::table('registro_eventos', function (Blueprint $table) {
        });
    }
}
