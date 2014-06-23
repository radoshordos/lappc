<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedService extends Migration
{

    public function up()
    {
        Schema::create('feed_service', function (Blueprint $table) {

            $table->integer('id')->unsigned();
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
        Schema::drop('feed_service');
    }

}