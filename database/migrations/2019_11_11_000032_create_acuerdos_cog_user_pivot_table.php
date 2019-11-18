<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosCogUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('acuerdos_cog_user', function (Blueprint $table) {
            $table->unsignedInteger('acuerdos_cog_id');

            $table->foreign('acuerdos_cog_id', 'acuerdos_cog_id_fk_588446')->references('id')->on('acuerdos_cogs')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_588446')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
