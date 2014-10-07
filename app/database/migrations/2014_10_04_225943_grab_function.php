<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrabFunction extends Migration
{

    public function up()
    {
        Schema::create('grab_profile', function (Blueprint $table) {

            $table->increments('id')->unsigned()->primary();
            $table->tinyInteger('mode_id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->string('function', 32)->unique();
            $table->string('name', 48)->unique();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('grab_function');
    }

}
