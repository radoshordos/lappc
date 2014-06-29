<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpcCampaign extends Migration
{
    public function up()
    {
        Schema::create('ppc_campaign', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('sklik_id')->unsigned()->nullable();
            $table->string('name','48');
            $table->string('utm','24');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('sklik_id');
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_campaign');
    }
}