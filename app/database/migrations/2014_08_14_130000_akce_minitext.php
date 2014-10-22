<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AkceMinitext extends Migration {

	public function up()
	{
        Schema::create('akce_minitext', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('origin')->default(0);
            $table->string('name', 32)->unique();

            $table->engine = 'InnoDB';
        });
	}

	public function down()
	{
        Schema::dropIfExists('akce_minitext');
	}

}