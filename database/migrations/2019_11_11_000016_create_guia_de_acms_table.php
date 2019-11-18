<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiaDeAcmsTable extends Migration
{
    public function up()
    {
        Schema::create('guia_de_acms', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cargo');

            $table->longText('acm')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
