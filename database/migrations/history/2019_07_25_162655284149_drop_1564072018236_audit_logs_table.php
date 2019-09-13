<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1564072018236AuditLogsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('audit_logs');
    }
}
