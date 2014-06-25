<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MixtureTreeM2nTree extends Migration
{

    public function up()
    {
        Schema::create('mixture_tree_m2n_tree', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mixture_id')->unsigned()->index();
            $table->foreign('mixture_id')->references('id')->on('mixture_tree')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tree_id')->unsigned()->index();
            $table->foreign('tree_id')->references('id')->on('tree')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('mixture_tree_m2n_tree');
    }

}