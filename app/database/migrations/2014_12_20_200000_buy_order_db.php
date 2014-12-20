<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderDb extends Migration {

	public function up()
	{
		Schema::create('buy_order_db', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->tinyInteger('order_status_id')->unsigned()->default(2);
			$table->char('sid',40);
			$table->string('remote_addr',512);
			$table->string('netbios',512);
			$table->string('browser',512);

			$table->double('products_total_price');
			$table->tinyInteger('delivery_id')->unsigned();
			$table->tinyInteger('payment_id')->unsigned();
			$table->double('delivery_price')->default(0);
			$table->double('payment_price')->default(0);
			$table->text('note')->nullable();

			$table->engine = 'InnoDB';
			$table->foreign('order_status_id')->references('id')->on('buy_order_status')->onUpdate('cascade')->onDelete('no action');
			$table->foreign('delivery_id')->references('id')->on('buy_delivery')->onUpdate('cascade')->onDelete('no action');
			$table->foreign('payment_id')->references('id')->on('buy_payment')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_db');
	}

}