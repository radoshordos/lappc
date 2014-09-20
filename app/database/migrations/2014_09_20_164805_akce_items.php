<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceItems extends Migration {

	public function up()
	{
		Schema::create('akce_items', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('akce_id')->unsigned();
			$table->integer('item_id')->unsigned();

			$table->engine = 'InnoDB';
			$table->foreign('akce_id')->references('id')->on('akce')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('akce_items');
	}

}