<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedDb extends Migration
{

    public function up()
    {
        Schema::create('feed_db', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->string('type', '16');
            $table->string('filename', '24');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('filename');
        });
    }


    public function down()
    {
        Schema::drop('feed_db');
    }

}