<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdAccessory extends Migration {

	public function up()
	{
		Schema::create('prod_accessory', function (Blueprint $table) {
			$table->increments('id')->unsigned()->primary();
			$table->enum('purpose', ['cronacc','useracc'])->default('cronacc');
			$table->integer('prod_from_id')->unsigned();
			$table->integer('prod_to_id')->unsigned();

			$table->engine = 'InnoDB';
			$table->unique(['prod_from_id','prod_to_id']);
			$table->foreign('prod_from_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('prod_to_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('prod_accessory');
	}

}
