<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncCsvTemplate extends Migration {

	public function up()
	{
        Schema::create('sync_csv_template', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('mixture_dev_id')->unsigned();
            $table->enum('purpose', array('sync','action'))->default('sync');
            $table->tinyInteger('trigger_column_count')->unsigned()->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('mixture_dev_id')->references('id')->on('mixture_dev')->onUpdate('cascade')->onDelete('cascade');
        });
	}

	public function down()
	{
        Schema::dropIfExists('sync_csv_template');
	}

}