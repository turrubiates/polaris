<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasCogUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actas_cog_user', function (Blueprint $table) {
            $table->unsignedInteger('actas_cog_id');

            $table->foreign('actas_cog_id', 'actas_cog_id_fk_588433')->references('id')->on('actas_cogs')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_588433')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
