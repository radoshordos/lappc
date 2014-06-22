<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedDb extends Migration
{

    public function up()
    {
        Schema::create('feed_db', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->tinyInteger('type_id')->unsigned();
            $table->string('filename', '24');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('filename');

            $table->foreign('type_id')->references('id')->on('feed_type')->onUpdate('cascade')->onDelete('no action');
        });
    }


    public function down()
    {
        Schema::drop('feed_db');
    }

}