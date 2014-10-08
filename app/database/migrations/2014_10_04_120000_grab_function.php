<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrabFunction extends Migration
{

    public function up()
    {
        Schema::create('grab_function', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->tinyInteger('mode_id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->string('function', 32)->unique();
            $table->string('name', 48)->unique();

            $table->engine = 'InnoDB';
            $table->foreign('mode_id')->references('id')->on('grab_mode')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grab_function');
    }

}
