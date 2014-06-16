<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdSale extends Migration
{

    public function up()
    {
        Schema::create('prod_sale', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->double('multiple')->unsigned();
            $table->string('name', '8');
            $table->string('desc', '32');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::drop('prod_sale');
    }

}