<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coupon extends Migration {

	public function up()
	{
		Schema::create('items_accessory', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('quantity_start')->unsigned();
			$table->integer('quantity_unused')->unsigned();
			$table->date('date_expiration');
			$table->integer('sale_price')->unsigned();
			$table->integer('sale_percent')->unsigned();
			$table->integer('name')->unsigned();
			$table->engine = 'InnoDB';
		});
	}

	public function down()
	{
		Schema::dropIfExists('coupon');
	}
}