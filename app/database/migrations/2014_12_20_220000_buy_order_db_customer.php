<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyOrderDbCustomer extends Migration
{
    public function up()
    {
        Schema::create('buy_order_db_customer', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->char('sid', 40)->unique();

            $table->integer('order_db_id')->unsigned()->nullable();
            $table->tinyInteger('delivery_id')->unsigned();
            $table->tinyInteger('payment_id')->unsigned();

            $table->binary('customer_firstname')->nullable();
            $table->binary('customer_lastname')->nullable();
            $table->binary('customer_phone')->nullable();
            $table->binary('customer_email')->nullable();
            $table->binary('customer_street')->nullable();
            $table->binary('customer_city')->nullable();
            $table->binary('customer_post_code')->nullable();
            $table->binary('customer_state')->nullable();

            $table->binary('firm_company')->nullable();
            $table->binary('firm_ico')->nullable();
            $table->binary('firm_dic')->nullable();

            $table->binary('delivery_firstname')->nullable();
            $table->binary('delivery_lastname')->nullable();
            $table->binary('delivery_street')->nullable();
            $table->binary('delivery_city')->nullable();
            $table->binary('delivery_post_code')->nullable();
            $table->binary('delivery_state')->nullable();
            $table->binary('delivery_company')->nullable();

            $table->binary('note')->nullable();

            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('order_db_id')->references('id')->on('buy_order_db')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('delivery_id')->references('id')->on('buy_delivery')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('payment_id')->references('id')->on('buy_payment')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('buy_order_db_customer');
    }
}