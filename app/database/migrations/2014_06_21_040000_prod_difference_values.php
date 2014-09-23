<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdDifferenceValues extends Migration {

	public function up()
	{
        Schema::create('prod_difference_values', function (Blueprint $table) {
            $table->smallInteger('id')->primary()->unsigned();
            $table->tinyInteger('set_id')->unsigned();
            $table->string('name', '32')->unique();

            $table->engine = 'InnoDB';
        });
	}

	public function down()
	{
        Schema::dropIfExists('prod_difference_values');
	}

}
