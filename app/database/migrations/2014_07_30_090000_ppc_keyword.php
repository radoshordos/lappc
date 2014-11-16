<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PpcKeyword extends Migration
{
    public function up()
    {
        Schema::create('ppc_keywords', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('item_id')->unsigned()->unique();
            $table->integer('sklik_id')->unsigned()->unique()->nullable();
            $table->tinyInteger('match_id')->unsigned()->default(1);
            $table->string('name')->unique();
            $table->integer('cpc')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('match_id')->references('id')->on('ppc_keywords_match')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_keywords', function (Blueprint $table) {
            $table->dropForeign('match_id');
        });
    }
}