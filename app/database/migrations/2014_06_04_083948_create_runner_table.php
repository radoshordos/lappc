<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Runner extends Migration
{
    public function up()
    {
        Schema::create('runner', function (Blueprint $table) {

            $table->smallInteger('id')->unsigned();
            $table->boolean("autorun")->default('true');
            $table->string("alias", "16");
            $table->string("command", "64");

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::drop('runner');
    }
}