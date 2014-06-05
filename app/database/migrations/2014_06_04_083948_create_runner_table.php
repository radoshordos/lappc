<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunnerTable extends Migration
{
    public function up()
    {
        Schema::create('runner', function (Blueprint $table) {

            $table->smallInteger('id')->unsigned();
            $table->boolean("autorun")->default(1);
            $table->string("alias", "16");
            $table->string("class", "128");
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::drop('runner');
    }
}