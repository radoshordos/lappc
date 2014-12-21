<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncCsvColumn extends Migration
{

	public function up()
	{
		Schema::create('sync_csv_column', function (Blueprint $table) {
			$table->tinyInteger('id')->unsigned()->primary();
			$table->string('element', '32')->unique();
			$table->string('desc', '256')->nullable();
			$table->engine = 'InnoDB';
		});
	}

	public function down()
	{
		Schema::dropIfExists('sync_csv_column');
	}

}