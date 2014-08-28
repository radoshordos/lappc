<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceTemplate extends Migration
{

    public function up()
    {
        Schema::create('akce_template', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('mixture_dev_id')->unsigned();
            $table->smallInteger('availibility_id')->unsigned();
            $table->smallInteger('minitext_id')->unsigned();
            $table->text('bonus_title', 64);
            $table->text('bonus_text', 256);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique(array('mixture_dev_id', 'minitext_id', 'availibility_id'));

            $table->foreign('mixture_dev_id')->references('id')->on('mixture_prod')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('akce_availability')->references('id')->on('mixture_prod')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('akce_minitext')->references('id')->on('mixture_prod')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('akce_template');
    }
}