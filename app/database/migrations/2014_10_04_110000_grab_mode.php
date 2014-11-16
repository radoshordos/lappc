<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrabMode extends Migration {

	public function up()
	{
        Schema::create('grab_mode', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned()->primary();
            $table->string('alias', 16)->unique();
            $table->string('name', 32)->unique();
            $table->engine = 'InnoDB';
        });
	}

	public function down()
	{
        Schema::dropIfExists('grab_mode');
	}

}