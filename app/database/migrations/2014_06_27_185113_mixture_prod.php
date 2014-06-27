<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MixtureProd extends Migration
{
    public function up()
    {
        Schema::create('mixture_prod', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', '64');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mixture_prod');
    }
}
