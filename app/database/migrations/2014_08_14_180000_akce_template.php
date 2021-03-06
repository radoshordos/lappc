<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceTemplate extends Migration {

	public function up() {

		Schema::create('akce_template', function (Blueprint $table) {

			$table->increments('id')->unsigned();
			$table->integer('mixture_dev_id')->unsigned();
			$table->integer('availability_id')->unsigned();
			$table->integer('minitext_id')->unsigned();
            $table->integer('mixture_item_id')->unsigned()->nullable();
			$table->date('endtime');
			$table->text('bonus_title', 64)->nullable();
			$table->text('bonus_text', 256)->nullable();
			$table->timestamps();

			$table->engine = 'InnoDB';
			$table->unique(['mixture_dev_id', 'minitext_id', 'availability_id', 'endtime'], 'unique_akce_template');

			$table->foreign('mixture_dev_id')->references('id')->on('mixture_dev')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('availability_id')->references('id')->on('akce_availability')->onUpdate('cascade')->onDelete('no action');
			$table->foreign('minitext_id')->references('id')->on('akce_minitext')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('mixture_item_id')->references('id')->on('mixture_item')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	public function down() {

		Schema::dropIfExists('akce_template');
	}
}