<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdwithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idwithdrawals', function (Blueprint $table) {
            $table->id();
            $table->text("idm");
            $table->text("username");
            $table->text("phone");
            $table->text("amount");
            $table->text("currency");
            $table->text("screenshot");
            $table->text("status");
            $table->text("depositid");
            $table->text("deposittype");
            $table->text("gatewayinfo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('idwithdrawals');
    }
}
