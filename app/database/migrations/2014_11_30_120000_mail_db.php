<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MailDb extends Migration {


	public function up()
	{
		//
	}


	public function down()
	{
        Schema::dropIfExists('mail_db');
	}

}
