<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpcAdTarget extends Migration
{
    public function up()
    {
        Schema::create('ppc_ad_target', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->integer('mixture_dev_id')->unsigned();
            $table->integer('mixture_tree_id')->unsigned();
            $table->integer('index')->unsigned();

            $table->engine = 'InnoDB';
            $table->primary('id');

            $table->foreign('mixture_dev_id')->references('id')->on('mixture_dev')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mixture_tree_id')->references('id')->on('mixture_tree')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_ad_target');
    }
}