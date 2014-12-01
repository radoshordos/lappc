<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Akce extends Migration {

	public function up() {

		Schema::create('akce', function (Blueprint $table) {

			$table->increments('akce_id')->unsigned();
            $table->integer('akce_prod_id')->unique()->unsigned();
            $table->integer('akce_template_id')->unsigned()->default(1);
            $table->tinyInteger('akce_sale_id')->unsigned()->default(1);
            $table->tinyInteger('akce_availability_id')->unsigned()->default(1);
            $table->decimal('akce_price', 9, 2)->unsigned()->default(0);
            $table->timestamp('akce_created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('akce_updated_at')->default('0000-00-00 00:00:00');
			$table->engine = 'InnoDB';

            $table->foreign('akce_prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('akce_template_id')->references('id')->on('akce_template')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('akce_sale_id')->references('id')->on('prod_sale')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('akce_availability_id')->references('id')->on('items_availability')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down() {

		Schema::dropIfExists('akce');
	}
}