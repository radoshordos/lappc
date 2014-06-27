<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedService extends Migration
{

    public function up()
    {
        Schema::create('feed_service', function (Blueprint $table) {

            $table->integer('id')->unsigned();
            $table->string('filename', '24');
            $table->string('class', '128');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('filename');
        });
    }


    public function down()
    {
        Schema::dropIfExists('feed_service');
    }

}