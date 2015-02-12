<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyDelivery extends Migration
{

	public function up()
	{
		Schema::create('buy_delivery', function (Blueprint $table) {
			$table->tinyInteger('id')->unsigned()->primary();
			$table->boolean('active', 0);
			$table->string('name', '32');
			$table->string('alias', '32')->unique();
			$table->decimal('price', 4, 2);
			$table->decimal('price_doc', 4, 2);
			$table->engine = 'InnoDB';
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_delivery');
	}
}