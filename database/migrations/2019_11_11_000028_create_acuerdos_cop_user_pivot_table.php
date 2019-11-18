<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcuerdosCopUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('acuerdos_cop_user', function (Blueprint $table) {
            $table->unsignedInteger('acuerdos_cop_id');

            $table->foreign('acuerdos_cop_id', 'acuerdos_cop_id_fk_588417')->references('id')->on('acuerdos_cops')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_588417')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
