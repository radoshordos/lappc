<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcDbMode extends Migration {

	public function up()
	{
		Schema::create('ppc_db_mode', function(Blueprint $table)
		{
			$table->tinyInteger('id')->unsigned();
            $table->boolean('active');
            $table->string('alias','16');
            $table->string('desc','32');

            $table->engine = 'InnoDB';
            $table->unique('alias');
		});
	}

	public function down()
	{
		Schema::drop('ppc_db_mode');
	}
}
