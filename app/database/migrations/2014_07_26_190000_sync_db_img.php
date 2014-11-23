<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SyncDbImg extends Migration
{

    public function up()
    {
        Schema::create('sync_db_img', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('sync_id')->unsigned();
            $table->string('url', '255');
            $table->engine = 'InnoDB';

            $table->foreign('sync_id')->references('id')->on('sync_db')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sync_db_img');
    }

}
