<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemsAccessory extends Migration {

	public function up()
	{
		Schema::create('items_accessory', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->enum('purpose', ['cronacc','useracc'])->default('cronacc');
			$table->integer('item_from_id')->unsigned();
			$table->integer('item_to_id')->unsigned();

			$table->engine = 'InnoDB';
			$table->unique(['item_from_id','item_to_id']);
			$table->foreign('item_from_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('item_to_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('items_accessory');
	}
}