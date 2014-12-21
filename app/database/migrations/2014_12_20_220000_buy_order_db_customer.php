<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderDbCustomer extends Migration {

	public function up()
	{
		Schema::create('buy_order_db_customer', function (Blueprint $table) {

			$table->increments('id')->unsigned();
			$table->integer('order_db_id')->unsigned()->nullable();
			$table->char('sid',40);

			$table->binary('customer_fullname')->nullable();
			$table->binary('customer_phone')->nullable();
			$table->binary('customer_email')->nullable();
			$table->binary('customer_street')->nullable();
			$table->binary('customer_city')->nullable();
			$table->binary('customer_post_code')->nullable();
			$table->binary('customer_state')->nullable();
			$table->binary('customer_company')->nullable();
			$table->binary('customer_ic')->nullable();
			$table->binary('customer_dic')->nullable();

			$table->binary('delivery_fullname')->nullable();
			$table->binary('delivery_street')->nullable();
			$table->binary('delivery_city')->nullable();
			$table->binary('delivery_post_code')->nullable();
			$table->binary('delivery_state')->nullable();
			$table->binary('delivery_company')->nullable();
			$table->timestamps();

			$table->engine = 'InnoDB';
			$table->foreign('order_db_id')->references('id')->on('buy_order_db')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_db_customer');
	}

}