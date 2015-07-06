<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TreeText extends Migration
{
    public function up()
    {
        Schema::create('tree_text', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('tree_id')->unsigned();
            $table->text('text')->nullable();

            $table->engine = 'InnoDB';
            $table->foreign('tree_id')->references('id')->on('tree')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tree_text');
    }
}