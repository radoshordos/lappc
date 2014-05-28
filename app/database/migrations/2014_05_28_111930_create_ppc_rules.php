<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcRules extends Migration {

	public function up()
	{
		Schema::create('ppc_rules', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->enum('modes', array('import', 'insert'));
            $table->string('dev');
            $table->tinyInteger('name_lenght_min')->unsigned();
            $table->tinyInteger('name_lenght_max')->unsigned();
            $table->tinyInteger('name_count_word_min')->unsigned();
            $table->tinyInteger('name_count_word_max')->unsigned();
            $table->tinyInteger('price_min')->unsigned();
            $table->tinyInteger('price_max')->unsigned();
            $table->enum('in_sell', array('YES','NO'));
            $table->enum('in_action', array('YES','NO'));
            $table->enum('ready_send', array('YES','NO'));
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ppc_rules');
	}

}