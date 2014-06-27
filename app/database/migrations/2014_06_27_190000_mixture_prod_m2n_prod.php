<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MixtureProdM2nProd extends Migration {

	public function up()
	{
		Schema::create('mixture_prod_m2n_prod', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mixture_prod_id')->unsigned()->index();
            $table->integer('prod_id')->unsigned()->index();

            $table->engine = 'InnoDB';

            $table->foreign('mixture_prod_id')->references('id')->on('mixture_prod')->onDelete('cascade');
			$table->foreign('prod_id')->references('id')->on('prod')->onDelete('cascade');
		});
	}

	public function down()
	{
        Schema::dropIfExists('mixture_prod_m2n_prod');
	}

}