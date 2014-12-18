<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderStatus extends Migration {

	public function up()
	{
		Schema::create('buy_order_status', function (Blueprint $table) {
			$table->tinyInteger('id')->unsigned();
			$table->boolean('visible', 1);
			$table->tinyInteger('heureka_order_status')->unique();
			$table->string('desc', '128')->unique();
			$table->engine = 'InnoDB';
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_status');
	}
}
