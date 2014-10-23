<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PpcDbMode extends Migration {

	public function up()
	{
		Schema::create('ppc_db_mode', function(Blueprint $table)
		{
			$table->tinyInteger('id')->unsigned();
            $table->boolean('active');
			$table->string('alias', '16')->unique();
            $table->string('desc','32');

            $table->engine = 'InnoDB';
		});
	}

	public function down()
	{
		Schema::dropIfExists('ppc_db_mode');
	}
}