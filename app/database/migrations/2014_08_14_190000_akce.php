<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Akce extends Migration {

	public function up() {

		Schema::create('akce', function (Blueprint $table) {

			$table->increments('id')->unsigned();
            $table->integer('aprod_id')->unsigned();
            $table->integer('atemplate_id')->unsigned()->default(1);
            $table->tinyInteger('asale_id')->unsigned()->default(1);
            $table->tinyInteger('aavailability_id')->unsigned()->default(1);
            $table->decimal('aprice', 9, 2)->unsigned()->default(0);
			$table->timestamps();
			$table->engine = 'InnoDB';

            $table->foreign('aprod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('atemplate_id')->references('id')->on('akce_template')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('asale_id')->references('id')->on('prod_sale')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('aavailability_id')->references('id')->on('items_availability')->onUpdate('cascade')->onDelete('no action');
		});
	}

	public function down() {

		Schema::dropIfExists('akce');
	}
}