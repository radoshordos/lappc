<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceItems extends Migration {

	public function up()
	{
		Schema::create('akce_items', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('item_id')->unsigned();
			$table->tinyInteger('sale_id')->unsigned();
			$table->tinyInteger('availability_id')->unsigned();
	//		$table->decimal('aiprice', 9, 2)->unsigned()->default(0);

			$table->engine = 'InnoDB';
			$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('akce_items');
	}

}