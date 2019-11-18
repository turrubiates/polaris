<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosCepEtiquetasAcuerdosDeProvinciumPivotTable extends Migration
{
    public function up()
    {
        Schema::create('acuerdos_cep_etiquetas_acuerdos_de_provincium', function (Blueprint $table) {
            $table->unsignedInteger('acuerdos_cep_id');

            $table->foreign('acuerdos_cep_id', 'acuerdos_cep_id_fk_588337')->references('id')->on('acuerdos_ceps')->onDelete('cascade');

            $table->unsignedInteger('etiquetas_acuerdos_de_provincium_id');

            $table->foreign('etiquetas_acuerdos_de_provincium_id', 'etiquetas_acuerdos_de_provincium_id_fk_588337')->references('id')->on('etiquetas_acuerdos_de_provincia')->onDelete('cascade');
        });
    }
}
