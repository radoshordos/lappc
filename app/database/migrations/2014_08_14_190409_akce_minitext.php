<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceMinitext extends Migration {

	public function up()
	{
        Schema::create('akce_minitext', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('origin')->default(0);
            $table->string('name', 32);

            $table->engine = 'InnoDB';
            $table->unique('name');
        });
	}

	public function down()
	{
        Schema::dropIfExists('akce_minitext');
	}

}