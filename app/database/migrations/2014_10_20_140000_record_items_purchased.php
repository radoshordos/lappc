<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordItemsPurchased extends Migration
{

    public function up()
    {
        Schema::create('record_items_purchased', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->char('sid',40);
            $table->integer('prod_id')->unsigned()->nullable();
            $table->tinyInteger('prod_forex_id')->unsigned();
            $table->tinyInteger('prod_mode_id')->unsigned();
            $table->integer('item_id')->unsigned()->nullable();
            $table->integer('item_count')->unsigned();
            $table->decimal('item_price', 9, 2)->unsigned();
            $table->integer('sell_id')->unsigned()->nullable();
            $table->boolean('sell_group')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique(['item_id', 'sell_id']);
        });
    }



    public function down()
    {
        Schema::dropIfExists('record_items_purchased');
    }

}