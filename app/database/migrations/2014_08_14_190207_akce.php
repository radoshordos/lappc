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
            $table->integer('sale_id')->unsigned();
            $table->integer('availibility_id')->unsigned();
            $table->integer('akce_price')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('akce');
    }
}