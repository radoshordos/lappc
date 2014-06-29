<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MixtureDev extends Migration
{

    public function up()
    {
        Schema::create('mixture_dev', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->enum('purpose', array('devgroup','ppc'))->default('devgroup');
            $table->string('name', '32');
            $table->string('desc', '256')->nullable();

            $table->engine = 'InnoDB';
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mixture_dev');
    }
}