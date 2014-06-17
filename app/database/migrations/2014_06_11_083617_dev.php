<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dev extends Migration
{
    public function up()
    {
        Schema::create('dev', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->boolean('active')->default(1);
            $table->boolean('authorized')->default(0);

            $table->tinyInteger('default_warranty_id')->unsigned()->default(1);
            $table->tinyInteger('default_sale_id')->unsigned()->default(1);
            $table->tinyInteger('default_availibility_id')->unsigned()->default(1);
//            $table->tinyInteger('default_delivery_date')->unsigned()->default(1);

            $table->string('alias', '32');
            $table->string('name', '32');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('name');
            $table->unique('alias');
        });
    }

    public function down()
    {
        Schema::drop('dev');
    }
}