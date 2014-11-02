<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProdSale extends Migration
{

    public function up()
    {
        Schema::create('prod_sale', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned()->primary();
            $table->boolean('visible')->default(1);
            $table->double('multiple')->unsigned();
            $table->string('name', '8')->unique();
            $table->string('desc', '32');
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('prod_sale');
    }

}