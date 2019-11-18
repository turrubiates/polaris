<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciaTable extends Migration
{
    public function up()
    {
        Schema::create('provincia', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nomenclatura')->nullable();

            $table->string('nombre')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
