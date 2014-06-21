<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdMode extends Migration {

    public function up()
    {

        Schema::create('prod_mode', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->boolean('visible');
            $table->string('name', '12');
            $table->string('message', '128')->nullable();

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('name');
        });
    }

	public function down()
	{
        Schema::drop('prod_mode');
	}
}