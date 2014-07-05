<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dph extends Migration {

    public function up()
    {
        Schema::create('dph', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->double('multiplier');
            $table->string('name');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('multiplier');
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dph');
    }

}