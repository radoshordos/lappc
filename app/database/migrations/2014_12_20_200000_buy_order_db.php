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
			$table->string('remote_addr', 512)->nullable();
			$table->string('netbios', 512)->nullable();
			$table->string('http_user_agent', 512)->nullable();
			$table->double('products_total_price')->unsigned()->default(0);
			$table->double('delivery_price')->unsigned()->default(0);
			$table->double('payment_price')->unsigned()->default(0);
			$table->timestamps();

			$table->engine = 'InnoDB';
			$table->foreign('order_status_id')->references('id')->on('buy_order_status')->onUpdate('cascade')->onDelete('no action');
		});

        \DB::unprepared("ALTER TABLE buy_order_db AUTO_INCREMENT = 10001;");
	}

	public function down()
	{
		Schema::dropIfExists('buy_order_db');
	}
}