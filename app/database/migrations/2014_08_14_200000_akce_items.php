<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AkceItems extends Migration
{

    public function up()
    {
        Schema::create('akce_items', function (Blueprint $table) {
            $table->increments('ai_id')->unsigned();
            $table->increments('ai_id_akce')->unsigned();
            $table->integer('ai_item_id')->unsigned();
            $table->integer('ai_id_diff1')->unsigned();
            $table->integer('ai_id_diff2')->unsigned();
            $table->tinyInteger('ai_availability_id')->unsigned();
            $table->string('ai_code_product')->unique()->nullable();
            $table->string('ai_code_ean')->unique()->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('ai_id_akce')->references('akce_id')->on('akce')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ai_item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('akce_items');
    }

}