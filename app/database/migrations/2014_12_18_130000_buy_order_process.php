<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderProcess extends Migration
{

	public function up()
	{
		Schema::create('buy_order_process', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->integer('order_id')->unsigned();
			$table->integer('user_id')->unsigned()->nullable();
			$table->tinyInteger('status_id')->unsigned();
			$table->timestamps();
			$table->engine = 'InnoDB';

			$table->foreign('order_id')->references('id')->on('buy_order_db')->onUpdate('cascade')->onDelete('cascade');
			// $table->foreign('user_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('status_id')->references('id')->on('buy_order_status')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_process');
	}

}