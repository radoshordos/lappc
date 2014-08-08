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
            $table->string('code_prod',32)->nullable();
            $table->string('code_ean',32)->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('code_prod');
            $table->unique('code_ean');

            $table->foreign('sale_id')->references('id')->on('items_sale')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('availability_id')->references('id')->on('items_availability')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }

}