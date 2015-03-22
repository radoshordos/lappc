<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MediaDb extends Migration
{

    public function up()
    {
        Schema::create('media_db', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('variations_id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->integer('mixture_dev_id')->unsigned()->nullable();
            $table->integer('mixture_prod_id')->unsigned()->nullable();
            $table->string('name', 255);
            $table->string('source', 510)->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_db');
    }

}
