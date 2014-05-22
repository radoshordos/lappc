<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTreeGroupTop extends Migration
{

    public function up()
    {
        Schema::create('tree_group_top', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::drop('tree_group_top');
    }

}
