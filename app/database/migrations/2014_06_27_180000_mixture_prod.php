<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MixtureProd extends Migration
{
    public function up()
    {
        Schema::create('mixture_prod', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('purpose', ['multimedia', 'rules_simple']);
            $table->string('name', '160')->unique();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('mixture_prod');
    }
}