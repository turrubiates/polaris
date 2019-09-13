<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlDeGastosTable extends Migration
{
    public function up()
    {
        Schema::create('control_de_gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->decimal('total', 15, 2);
            $table->decimal('iva', 15, 2)->nullable();
            $table->string('folio_fiscal')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
