<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncDb extends Migration {

	public function up()
	{
        Schema::create('sync_db', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->enum('purpose', array('sync','action'));
            $table->integer('dev_id')->unsignet();
            $table->string('code_product', '32')->nullable();
            $table->string('code_ean', '32')->nullable();
            $table->string('name', '80')->nullable();
            $table->string('desc', '160')->nullable();
            $table->double('price_standart')->nullable();
            $table->double('price_action')->nullable();
            $table->double('price_internet')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
	}

	public function down()
	{
        Schema::dropIfExists('sync_db');
	}

}