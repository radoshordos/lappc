<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncCsvTemplate extends Migration {

	public function up()
	{
        Schema::create('sync_csv_template', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('sklik_id')->unsigned()->nullable();
            $table->enum('purpose', array('manual_sync','manual_action'))->default('manual_action');
            $table->tinyInteger('count_column')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('name');
        });
	}

	public function down()
	{
        Schema::dropIfExists('sync_csv_template');
	}

}