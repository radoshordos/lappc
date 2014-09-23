<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdDifferenceSet extends Migration
{

    public function up()
    {
        Schema::create('prod_difference_set', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->string('name', '32')->unique();
            $table->string('sortby', '16')->default('pds_id');

            $table->engine = 'InnoDB';
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prod_difference_set');
    }

}
