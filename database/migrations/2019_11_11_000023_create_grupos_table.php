<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('grupo');

            $table->string('nombre_de_grupo')->nullable();

            $table->string('email')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
