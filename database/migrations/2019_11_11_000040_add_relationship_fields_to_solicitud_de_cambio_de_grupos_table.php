<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSolicitudDeCambioDeGruposTable extends Migration
{
    public function up()
    {
        Schema::table('solicitud_de_cambio_de_grupos', function (Blueprint $table) {
            $table->unsignedInteger('persona_a_cambiar_id');

            $table->foreign('persona_a_cambiar_id', 'persona_a_cambiar_fk_588554')->references('id')->on('users');
        });
    }
}
