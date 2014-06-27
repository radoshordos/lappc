<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MixtureTree extends Migration
{

    public function up()
    {
        Schema::create('mixture_tree', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', '64');

            $table->engine = 'InnoDB';
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mixture_tree');
    }

}