<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncDbSpecification extends Migration
{
    public function up()
    {
        Schema::create('sync_db_specification', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('media_variations_id')->unsigned();
            $table->integer('sync_id')->unsigned();
            $table->string('label', '255');
            $table->engine = 'InnoDB';

            $table->foreign('media_variations_id')->references('id')->on('media_variations')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('sync_id')->references('id')->on('sync_db')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sync_db_specification');
    }
}