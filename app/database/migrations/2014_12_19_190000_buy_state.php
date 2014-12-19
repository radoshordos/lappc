<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyState extends Migration
{

	public function up()
	{
		Schema::create('buy_state', function (Blueprint $table) {
			$table->tinyInteger('id')->unsigned()->primary();
			$table->tinyInteger('forex_id')->unsigned();
			$table->boolean('visible')->default(0);
			$table->string('name', 64);
			$table->string('symbol', 4);

			$table->engine = 'InnoDB';
			$table->foreign('forex_id')->references('id')->on('forex')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_state');
	}
}
