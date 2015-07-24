<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedZboziCz extends Migration
{
    public function up()
    {
        Schema::create('feed_zbozi_cz', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('category_id')->unsigned()->unique();
            $table->string('name', 128);
            $table->string('destination', 255);
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('feed_zbozi_cz');
    }
}