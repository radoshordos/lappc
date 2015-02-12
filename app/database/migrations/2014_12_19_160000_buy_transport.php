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
			$table->boolean('active')->default(1);
			$table->string('alias',32)->uniqie();
			$table->string('name', '64');
			$table->string('desc', '96')->unique();
			$table->double('price_start')->unsigned();
			$table->double('price_end')->unsigned();
			$table->decimal('weight_start', 8, 3)->unsigned();
			$table->decimal('weight_end', 8, 3)->unsigned();

			$table->engine = 'InnoDB';
			$table->foreign('transport_type_id')->references('id')->on('buy_transport_type')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_transport');
	}

}