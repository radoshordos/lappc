<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Dev extends Migration
{
    public function up()
    {
        Schema::create('dev', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->boolean('active')->default(1);
            $table->boolean('authorized')->default(0);
            $table->tinyInteger('default_warranty_id')->unsigned()->default(1);
            $table->tinyInteger('default_sale_prod_id')->unsigned()->default(1);
            $table->tinyInteger('default_sale_action_id')->unsigned()->default(1);
            $table->tinyInteger('default_availibility_id')->unsigned()->default(2);
            $table->string('alias', '32')->unique();
            $table->string('name', '32')->unique();
            $table->engine = 'InnoDB';

            $table->foreign('default_warranty_id')->references('id')->on('prod_warranty')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('default_sale_prod_id')->references('id')->on('prod_sale')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('default_sale_action_id')->references('id')->on('prod_sale')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('default_availibility_id')->references('id')->on('items_availability')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dev', function (Blueprint $table) {
            $table->dropForeign('default_warranty_id');
            $table->dropForeign('default_sale_prod_id');
            $table->dropForeign('default_sale_action_id');
            $table->dropForeign('default_availibility_id');
        });
    }
}