<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroEventosTable extends Migration
{
    public function up()
    {
        Schema::create('registro_eventos', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
