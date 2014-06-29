<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpcAdQuality extends Migration
{
    public function up()
    {
        Schema::create('ppc_ad_quality', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->boolean('visible');
            $table->string('name', '48');
            $table->tinyInteger('index')->unsigned();

            $table->engine = 'InnoDB';
            $table->unique('index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_ad_quality');
    }
}