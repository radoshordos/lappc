<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderDbCustomer extends Migration {

	public function up()
	{
		Schema::create('buy_order_db_customer', function (Blueprint $table) {

			$table->increments('id')->unsigned();
			$table->integer('order_db_id')->unsigned();

			$table->string('customer_fullname','255');
			$table->string('customer_phone','255');
			$table->string('customer_email','255');
			$table->string('customer_street','255');
			$table->string('customer_city','255');
			$table->string('customer_post_code','255');
			$table->string('customer_state','255');
			$table->string('customer_company','255')->nullable();
			$table->string('customer_ic','255')->nullable();
			$table->string('customer_dic','255')->nullable();

			$table->string('delivery_fullname','255')->nullable();
			$table->string('delivery_street','255')->nullable();
			$table->string('delivery_city','255')->nullable();
			$table->string('delivery_post_code','255')->nullable();
			$table->string('delivery_state','255')->nullable();
			$table->string('delivery_company','255')->nullable();

			$table->engine = 'InnoDB';
			$table->foreign('order_db_id')->references('id')->on('buy_order_db')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_db_customer');
	}

}