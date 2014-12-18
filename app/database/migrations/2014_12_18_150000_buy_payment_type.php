<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyPaymentType extends Migration
{

	public function up()
	{
		Schema::create('buy_payment_type', function (Blueprint $table) {
			$table->tinyInteger('id')->unsigned()->primary();
			$table->tinyInteger('heureka_payment_type')->unsigned()->unique();
			$table->string('name', '64')->unique();
			$table->engine = 'InnoDB';
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_payment_type');
	}

}
