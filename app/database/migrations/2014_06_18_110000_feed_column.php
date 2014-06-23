<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedColumn extends Migration
{

    public function up()
    {
        Schema::create('feed_column', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->string('name', '32');
            $table->string('support', '256');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::drop('feed_column');
    }
}