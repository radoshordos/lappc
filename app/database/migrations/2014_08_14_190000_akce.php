<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Akce extends Migration {

	public function up() {

		Schema::create('akce', function (Blueprint $table) {

			$table->increments('id')->unsigned();
			$table->integer('prod_id')->unsigned();
			$table->integer('template_id')->unsigned()->default(1);
			$table->tinyInteger('sale_id')->unsigned()->default(1);
			$table->tinyInteger('availability_id')->unsigned()->default(1);
			$table->decimal('akce_price',9,2)->unsigned()->default(0);
			$table->timestamps();
			$table->engine = 'InnoDB';

			$table->foreign('prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('template_id')->references('id')->on('akce_template')->onUpdate('cascade')->onDelete('no action');
			$table->foreign('sale_id')->references('id')->on('prod_sale')->onUpdate('cascade')->onDelete('no action');
			$table->foreign('availability_id')->references('id')->on('items_availability')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down() {

		Schema::dropIfExists('akce');
	}
}