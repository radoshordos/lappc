<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PpcCampaign extends Migration
{
    public function up()
    {
        Schema::create('ppc_campaign', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('sklik_id')->unsigned()->nullable()->unique();
            $table->string('name', '48')->unique();
            $table->string('utm', '24')->unique();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_campaign');
    }
}