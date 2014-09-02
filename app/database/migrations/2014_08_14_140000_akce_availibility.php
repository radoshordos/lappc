<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AkceAvailibility extends Migration
{
    public function up()
    {
        Schema::create('akce_availability', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('origin')->default(0);
            $table->string('name', 168);

            $table->engine = 'InnoDB';
            $table->unique(array('name', 'endtime'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('akce_availability');
    }
}