<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordItemsPurchased extends Migration
{

    public function up()
    {
        Schema::create('record_items_purchased', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('items_id')->unsigned()->nullable();
            $table->integer('prod_id')->unsigned()->nullable();
            $table->tinyInteger('prod_mode_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->boolean('is_group_order')->default(0);
            $table->decimal('iprice', 9, 2)->unsigned();
            $table->tinyInteger('forex_id')->unsigned();
            $table->tinyInteger('buy_count')->unsigned();
            $table->dateTime('create_at');

            $table->engine = 'InnoDB';
            $table->unique(['items_id', 'order_id']);
        });
    }

    public function down()
    {
		Schema::dropIfExists('record_items_purchased');
    }

}