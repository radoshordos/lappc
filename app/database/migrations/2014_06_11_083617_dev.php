<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dev extends Migration {

    public function up()
    {
        Schema::create('dev', function (Blueprint $table) {

            $table->smallInteger('id')->unsigned();
            $table->boolean('active')->default(1);

            $table->tinyInteger('default_warranty')->unsigned();
            $table->tinyInteger('default_sale')->unsigned();
            $table->tinyInteger('default_availibility')->unsigned();
            $table->tinyInteger('default_delivery_date')->unsigned();

            $table->string('alias','32');
            $table->string('name','32');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('name');
            $table->unique('alias');

        });
    }

    public function down()
    {
        Schema::drop('dev');
    }
}