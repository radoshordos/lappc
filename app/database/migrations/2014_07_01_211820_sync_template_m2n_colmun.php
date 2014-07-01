<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncTemplateM2nColmun extends Migration {

	public function up()
	{
        Schema::create('sync_template_m2n_colmun', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->tinyInteger('column_id')->unsigned();

            $table->engine = 'InnoDB';

            $table->foreign('template_id')->references('id')->on('sync_csv_template')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('column_id')->references('id')->on('sync_csv_column')->onUpdate('cascade')->onDelete('cascade');
        });

	}

	public function down()
	{
        Schema::dropIfExists('sync_template_m2n_colmun');
	}

}