<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Dph extends Migration {

    public function up()
    {
        Schema::create('dph', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned()->primary();
            $table->boolean('visible')->default(1);
            $table->double('multiplier')->unique();
            $table->string('name')->unique();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('dph');
    }

}