<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderDb extends Migration
{

	public function up()
	{
		Schema::create('buy_order_db', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->tinyInteger('order_status_id')->unsigned()->default(2);
			$table->char('sid', 40)->unique();
			$table->string('remote_addr', 512);
			$table->string('netbios', 512);
			$table->string('browser', 512);
			$table->decimal('products_total_price', 11, 2)->unsigned()->default(0);
			$table->decimal('delivery_price', 11, 2)->unsigned()->default(0);
			$table->decimal('payment_price', 11, 2)->unsigned()->default(0);
			$table->timestamps();

			$table->engine = 'InnoDB';
			$table->foreign('order_status_id')->references('id')->on('buy_order_status')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_db');
	}

}