<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Forex extends Migration
{

    public function up()
    {
        Schema::create('forex', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->string('code',8);
            $table->string('currency',4);
            $table->string('cnb_date',16)->nulable();
            $table->double('exchange_rate');
            $table->tinyInteger('round_with')->unsigned();
            $table->tinyInteger('round_without')->unsigned();
	        $table->decimal('step',4,2)->unsigned();

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('code');
        });
    }

    public function down()
    {
        Schema::dropIfExists('forex');
    }

}