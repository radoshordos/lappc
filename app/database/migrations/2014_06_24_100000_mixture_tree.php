<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TreeMixture extends Migration
{

    public function up()
    {
        Schema::create('mixture_tree', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', '64');
        });
    }


    public function down()
    {
        Schema::drop('mixture_tree');
    }

}
