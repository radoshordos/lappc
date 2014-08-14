<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceTemplate extends Migration
{

    public function up()
    {
        Schema::create('akce_template', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('dev_id')->unsigned();
            $table->smallInteger('minitext_id')->unsigned();
            $table->smallInteger('availibility_id')->unsigned();
            $table->text('bonus_title', 64);
            $table->text('bonus_title', 256);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('akce_template');
    }
}
