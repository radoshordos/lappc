<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordVisitorsHit extends Migration
{
    public function up()
    {
        Schema::create('record_visitors_hit', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at');
            $table->string('http_referer', 255)->nullable();
            $table->string('request_url', 255)->nullable();
            $table->string('remote_addr', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('record_visitors_hit');
    }
}