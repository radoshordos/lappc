<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TreeGroupTop extends Migration
{
    public function up()
    {
        Schema::create('tree_group_top', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned();
            $table->string('name');

            $table->engine = 'InnoDB';
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::drop('tree_group_top');
    }
}