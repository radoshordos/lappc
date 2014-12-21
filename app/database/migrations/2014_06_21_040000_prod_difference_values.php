<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdDifferenceValues extends Migration {

	public function up()
	{
        Schema::create('prod_difference_values', function (Blueprint $table) {
            $table->smallInteger('id')->unsigned()->primary();
            $table->smallInteger('set_id')->unsigned();
            $table->string('name', '32')->unique();

            $table->engine = 'InnoDB';
            $table->foreign('set_id', 'fk_pdv_2_pds')->references('id')->on('prod_difference_set')->onUpdate('cascade')->onDelete('no action');
        });
	}

	public function down()
	{
        Schema::dropIfExists('prod_difference_values');
	}

}
