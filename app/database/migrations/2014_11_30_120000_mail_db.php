<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MailDb extends Migration {


	public function up()
	{
		Schema::create('mail_db', function (Blueprint $table) {
			$table->increments('id')->unsigned()->primary();
			$table->enum('purpose', ['insert_eshop','insert_visitor']);

			$table->boolean('visible')->default(0);
			$table->string('name')->unique();
			$table->engine = 'InnoDB';
		});
	}


	public function down()
	{
        Schema::dropIfExists('mail_db');
	}

}
