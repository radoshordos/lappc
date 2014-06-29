<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpcAd extends Migration
{
    public function up()
    {
        Schema::create('ppc_ad', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('campaign_id')->unsigned();
            $table->integer('target_id')->unsigned();
            $table->integer('quality_id')->unsigned();
            $table->string('creative1', 64);
            $table->string('creative2', 128);
            $table->string('creative3', 128);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique(array('campaign_id', 'target_id', 'quality_id'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_ad');
    }
}