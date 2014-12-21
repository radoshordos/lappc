<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordItemsPurchased extends Migration
{

	public function up()
	{
		Schema::create('buy_order_db_items', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->char('sid', 40);
			$table->integer('item_id')->unsigned()->nullable();
			$table->integer('order_id')->unsigned()->nullable();
			$table->boolean('order_group')->default(0);
			$table->tinyInteger('prod_forex_id')->unsigned();
			$table->tinyInteger('prod_mode_id')->unsigned();
			$table->tinyInteger('prod_name')->unsigned();
			$table->integer('item_count')->unsigned();
			$table->decimal('item_price', 9, 2)->unsigned();
			$table->timestamps();

			$table->engine = 'InnoDB';
			$table->unique(['item_id', 'sell_id']);
			$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('order_id')->references('id')->on('buy_order_db')->onUpdate('cascade')->onDelete('set null');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_db_items');
	}

}