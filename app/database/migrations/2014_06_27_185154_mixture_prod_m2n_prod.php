<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMixtureProdProdTable extends Migration {

	public function up()
	{
		Schema::create('mixture_prod_m2n_prod', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mixture_prod_id')->unsigned()->index();
			$table->foreign('mixture_prod_id')->references('id')->on('mixture_prods')->onDelete('cascade');
			$table->integer('prod_id')->unsigned()->index();
			$table->foreign('prod_id')->references('id')->on('prods')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
        Schema::dropIfExists('mixture_prod_m2n_prod');
	}

}