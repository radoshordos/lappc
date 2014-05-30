<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcKeywordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adm.ppc.keywords', function(Blueprint $table)
		{
			$table->increments('id');
			$table->Integer,sklik_id('match_id')->Integer,name()->String,cpc()->Integer();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adm.ppc.keywords');
	}

}
