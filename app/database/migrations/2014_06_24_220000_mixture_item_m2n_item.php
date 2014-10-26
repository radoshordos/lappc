<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MixtureItemM2nItem extends Migration
{
    public function up()
    {
        Schema::create('mixture_item_m2n_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mixture_item_id')->unsigned()->index();
            $table->integer('item_id')->unsigned()->index();

            $table->engine = 'InnoDB';
            $table->foreign('mixture_item_id')->references('id')->on('mixture_item')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mixture_item_m2n_item');
    }

}