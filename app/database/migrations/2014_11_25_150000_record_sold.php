<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordSold extends Migration {


	public function up()
	{

	}

	public function down()
	{
		Schema::dropIfExists('record_sold');
	}

}
