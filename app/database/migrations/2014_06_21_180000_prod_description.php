<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProdDescription extends Migration
{

    public function up()
    {
        Schema::create('prod_description', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->smallInteger('variations_id')->unsigned();
            $table->text('data');

            $table->engine = 'InnoDB';
            $table->unique(['prod_id', 'variations_id']);

            $table->foreign('prod_id')->references('id')->on('prod')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('variations_id')->references('id')->on('media_variations')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prod_description');
    }

}