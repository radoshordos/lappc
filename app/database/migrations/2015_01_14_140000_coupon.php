<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coupon extends Migration
{

	public function up()
	{
		Schema::create('coupon', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('quantity_start')->unsigned();
			$table->integer('quantity_used')->unsigned()->default(0);
			$table->date('date_expiration');
			$table->integer('sale_price')->unsigned()->nullable();
			$table->integer('sale_percent')->unsigned()->nullable();
			$table->string('code', 32);
			$table->string('name', 128);
			$table->engine = 'InnoDB';
		});
	}

	public function down()
	{
		Schema::dropIfExists('coupon');
	}
}