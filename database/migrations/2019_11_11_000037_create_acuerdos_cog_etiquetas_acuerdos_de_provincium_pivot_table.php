<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosCogEtiquetasAcuerdosDeProvinciumPivotTable extends Migration
{
    public function up()
    {
        Schema::create('acuerdos_cog_etiquetas_acuerdos_de_provincium', function (Blueprint $table) {
            $table->unsignedInteger('acuerdos_cog_id');

            $table->foreign('acuerdos_cog_id', 'acuerdos_cog_id_fk_588447')->references('id')->on('acuerdos_cogs')->onDelete('cascade');

            $table->unsignedInteger('etiquetas_acuerdos_de_provincium_id');

            $table->foreign('etiquetas_acuerdos_de_provincium_id', 'etiquetas_acuerdos_de_provincium_id_fk_588447')->references('id')->on('etiquetas_acuerdos_de_provincia')->onDelete('cascade');
        });
    }
}
