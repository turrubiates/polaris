<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaMedicasTable extends Migration
{
    public function up()
    {
        Schema::create('ficha_medicas', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
