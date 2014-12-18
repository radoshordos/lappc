<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyPayment extends Migration
{
	public function up()
	{
		Schema::create('buy_payment', function (Blueprint $table) {
			$table->tinyInteger('id')->unsigned()->primary();
			$table->tinyInteger('payment_type_id')->unsigned();
			$table->string('name', '64')->unique();

			$table->engine = 'InnoDB';
			$table->foreign('payment_type_id')->references('id')->on('buy_payment_type')->onUpdate('cascade')->onDelete('no action');
		});
	}


	public function down()
	{
		Schema::dropIfExists('buy_payment');
	}

}
