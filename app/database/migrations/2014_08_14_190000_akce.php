<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Akce extends Migration
{

    public function up()
    {
        Schema::create('akce', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->integer('template_id')->unsigned();
            $table->tinyInteger('sale_id')->unsigned();
            $table->tinyInteger('availability_id')->unsigned();
            $table->integer('akce_price')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';

            $table->foreign('prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('template_id')->references('id')->on('akce_template')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('sale_id')->references('id')->on('items_sale')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('availability_id')->references('id')->on('items_availability')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('akce');
    }
}