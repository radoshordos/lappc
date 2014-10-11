<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdDifferenceN2mSet extends Migration {


	public function up()
	{
        Schema::create('prod_difference_n2m_set', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('difference_id')->unsigned();
            $table->tinyInteger('set_id')->unsigned();

            $table->engine = 'InnoDB';
            $table->unique(['difference_id','set_id']);
        });
	}


	public function down()
	{
        Schema::dropIfExists('prod_difference_n2m_set');
	}

}
