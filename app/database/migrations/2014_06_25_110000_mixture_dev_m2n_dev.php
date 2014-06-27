<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MixtureDevM2nDev extends Migration
{

    public function up()
    {
        Schema::create('mixture_dev_m2n_dev', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('mixture_dev_id')->unsigned();
            $table->integer('dev_id')->unsigned();

            $table->engine = 'InnoDB';

            $table->foreign('mixture_dev_id')->references('id')->on('mixture_dev')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dev_id')->references('id')->on('dev')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mixture_dev_m2n_dev', function (Blueprint $table) {
            $table->dropForeign('group_id');
            $table->dropForeign('dev_id');
        });
    }

}