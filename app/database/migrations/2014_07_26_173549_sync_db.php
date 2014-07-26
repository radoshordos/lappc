<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncDb extends Migration {

	public function up()
	{
        Schema::create('sync_db', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->enum('purpose', array('sync','action'));
            $table->string('name', '64')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
	}

	public function down()
	{
        Schema::dropIfExists('sync_db');
	}

}