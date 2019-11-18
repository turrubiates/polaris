<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosCopEtiquetasAcuerdosDeProvinciumPivotTable extends Migration
{
    public function up()
    {
        Schema::create('acuerdos_cop_etiquetas_acuerdos_de_provincium', function (Blueprint $table) {
            $table->unsignedInteger('acuerdos_cop_id');

            $table->foreign('acuerdos_cop_id', 'acuerdos_cop_id_fk_588418')->references('id')->on('acuerdos_cops')->onDelete('cascade');

            $table->unsignedInteger('etiquetas_acuerdos_de_provincium_id');

            $table->foreign('etiquetas_acuerdos_de_provincium_id', 'etiquetas_acuerdos_de_provincium_id_fk_588418')->references('id')->on('etiquetas_acuerdos_de_provincia')->onDelete('cascade');
        });
    }
}
