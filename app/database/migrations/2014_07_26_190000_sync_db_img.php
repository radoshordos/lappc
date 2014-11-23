<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SyncDbImg extends Migration
{

    public function up()
    {
        Schema::create('sync_db_img', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('url', '255');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sync_db_img');
    }

}
