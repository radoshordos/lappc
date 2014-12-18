<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyTransport extends Migration
{

	public function up()
	{
		Schema::create('buy_transport', function (Blueprint $table) {
			$table->tinyInteger('id')->unsigned()->primary();
			$table->tinyInteger('transport_type_id')->unsigned();
			$table->string('name', '64')->unique();

			$table->engine = 'InnoDB';
			$table->foreign('transport_type_id')->references('id')->on('buy_transport_type')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_transport');
	}

}