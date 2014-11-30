<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RecordMarketSell extends Migration
{

    public function up()
    {
        Schema::create('record_market_sell', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->date('month')->unique();
            $table->smallInteger('count_buy_all')->unsigned();
            $table->smallInteger('count_buy_success')->unsigned();
            $table->decimal('price_all', 9, 2)->unsigned()->default(0);
            $table->decimal('price_transport', 9, 2)->unsigned()->default(0);
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('record_market_sell');
    }

}