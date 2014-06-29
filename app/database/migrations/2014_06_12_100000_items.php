<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Items extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->tinyInteger('sale_id')->unsigned();
            $table->tinyInteger('availability_id')->unsigned();
            $table->string('code_product',32)->nullable();
            $table->string('code_ean',32)->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('code_product');
            $table->unique('code_ean');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }

}