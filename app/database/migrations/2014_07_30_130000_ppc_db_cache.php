<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpcDbCache extends Migration
{

    public function up()
    {
        Schema::create('ppc_db_cache', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('feed_id')->default(1)->unsigned();
            $table->integer('item_id')->unsigned();
            $table->tinyInteger('mode_id')->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->index('mode_id');
            $table->unique(array('feed_id', 'item_id'));

        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_db_cache');
    }

}