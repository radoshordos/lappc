<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedServiceM2nColumn extends Migration {

	public function up()
	{
        Schema::create('feed_service_m2n_column', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->integer('column_id')->unsigned();
            $table->boolean('value')->default(0);

            $table->engine = 'InnoDB';
            $table->unique(array('service_id', 'column_id'));

            $table->foreign('service_id')->references('id')->on('feed_service')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('column_id')->references('id')->on('feed_column')->onUpdate('cascade')->onDelete('cascade');
        });
	}

	public function down()
	{
        Schema::drop('feed_service_m2n_column');
	}

}