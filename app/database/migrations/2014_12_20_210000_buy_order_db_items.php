<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderDbItems extends Migration
{

	public function up()
	{
		Schema::create('buy_order_db_items', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->char('sid', 40)->unique();
			$table->integer('item_id')->unsigned()->nullable();
			$table->integer('order_id')->unsigned()->nullable();
			$table->boolean('order_group')->default(0);
			$table->tinyInteger('prod_forex_id')->unsigned();
			$table->tinyInteger('prod_mode_id')->unsigned();
			$table->string('prod_fullname', 255)->nullable();
			$table->integer('item_count')->unsigned();
			$table->decimal('item_price', 9, 2)->unsigned();
			$table->timestamps();

			$table->engine = 'InnoDB';
			$table->unique(['item_id', 'order_id']);
			$table->foreign('item_id', 'fk_bodi_2_i')->references('id')->on('items')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('order_id', 'fk_bodi_2_bod')->references('id')->on('buy_order_db')->onUpdate('cascade')->onDelete('set null');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_db_items');
	}

}