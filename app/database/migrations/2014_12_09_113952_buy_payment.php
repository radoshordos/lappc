<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyPayment extends Migration {

	public function up()
	{

	}


	public function down()
	{
		Schema::dropIfExists('buy_payment');
	}

}
