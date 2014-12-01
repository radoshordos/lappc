<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordItemSell extends Migration
{

    public function up()
    {
        Schema::create('record_item_sell', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned();
            $table->char('sid',40);
            $table->integer('items_id')->unsigned();
            $table->integer('items_count')->default(1);
            $table->integer('sell_id')->unsigned()->nullable();
            $table->boolean('sell_group')->default(0);
            $table->tinyInteger('prod_mode_id')->unsigned();
            $table->decimal('price_sell', 9, 2)->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('record_item_sell');
    }

}