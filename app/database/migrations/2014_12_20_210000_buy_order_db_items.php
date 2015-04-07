<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderDbItems extends Migration
{

    public function up()
    {
        Schema::create('buy_order_db_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->char('sid', 40)->index()->nullable();
            $table->integer('item_id')->unsigned()->nullable();
            $table->integer('order_id')->unsigned()->nullable();
            $table->boolean('order_group')->default(0);
            $table->tinyInteger('prod_forex_id')->unsigned();
            $table->tinyInteger('prod_mode_id')->unsigned();
            $table->integer('prod_dev_id')->unsigned()->nullable();
            $table->string('prod_fullname', 255)->nullable();
            $table->integer('item_count')->unsigned();
            $table->decimal('item_price', 9, 2)->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique(['item_id', 'order_id']);
            $table->foreign('item_id', 'fk_bodi_2_ii')->references('id')->on('items')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('order_id', 'fk_bodi_2_oi')->references('id')->on('buy_order_db')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('prod_mode_id', 'fk_bodi_2_pmi')->references('id')->on('prod_mode')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('prod_forex_id', 'fk_bodi_2_pfi')->references('id')->on('forex')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('prod_dev_id', 'fk_bodi_2_pdi')->references('id')->on('dev')->onUpdate('cascade')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('buy_order_db_items');
    }

}