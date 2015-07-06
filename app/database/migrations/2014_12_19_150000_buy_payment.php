<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuyPayment extends Migration
{
    public function up()
    {
        Schema::create('buy_payment', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned()->primary();
            $table->tinyInteger('payment_type_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->string('alias', '32')->unique();
            $table->string('name', '64')->unique();
            $table->string('name_short', '16')->unique();
            $table->string('image', '96')->nullable();
            $table->double('price_payment')->unsigned();

            $table->engine = 'InnoDB';
            $table->foreign('payment_type_id')->references('id')->on('buy_payment_type')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('buy_payment');
    }

}
