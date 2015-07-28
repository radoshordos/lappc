<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedService extends Migration
{
    public function up()
    {
        Schema::create('feed_service', function (Blueprint $table) {

            $table->integer('id')->unsigned();
            $table->string('execute', '24')->unique();
            $table->string('filename', '24')->unique();
            $table->string('class', '128');

            $table->engine = 'InnoDB';
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('feed_service');
    }
}