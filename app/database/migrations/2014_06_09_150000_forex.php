<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Forex extends Migration {

    public function up()
    {
        Schema::create('forex', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();

            $table->engine = 'InnoDB';
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('forex');
    }

}