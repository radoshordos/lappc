<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordVisitorsHit extends Migration
{
    public function up()
    {
        Schema::create('record_visitors_hit', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('created_int');
            $table->string('request_url', 255)->nullable();
            $table->string('remote_addr', 255)->nullable();
            $table->string('user_agent', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('record_visitors_hit');
    }
}