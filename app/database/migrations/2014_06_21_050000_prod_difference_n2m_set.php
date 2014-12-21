<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdDifferenceN2mSet extends Migration
{

	public function up()
	{
		Schema::create('prod_difference_n2m_set', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->smallInteger('difference_id')->unsigned();
			$table->smallInteger('set_id')->unsigned();

			$table->engine = 'InnoDB';
			$table->unique(['difference_id', 'set_id']);

			$table->foreign('difference_id', 'fk_pdns_2_pd')->references('id')->on('prod_difference')->onUpdate('cascade')->onDelete('no action');
			$table->foreign('set_id', 'fk_pdns_2_pds')->references('id')->on('prod_difference_set')->onUpdate('cascade')->onDelete('cascade');
		});
	}



	public function down()
	{
		Schema::dropIfExists('prod_difference_n2m_set');
	}

}
