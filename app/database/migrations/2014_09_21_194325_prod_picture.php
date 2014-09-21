<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdPicture extends Migration
{
	public function up()
	{
		Schema::create('prod_picture', function (Blueprint $table) {

			$table->increments('id')->unsigned();
			$table->integer('prod_id')->unsigned();
			$table->string('img_big', 80);
			$table->string('img_normal', 80);
			$table->string('img_snormal', 80);
			$table->string('img_small', 80);

			$table->engine = 'InnoDB';
			$table->foreign('prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('prod_picture');
	}
}