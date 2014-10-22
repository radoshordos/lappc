<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AkceAvailibility extends Migration
{
    public function up()
    {
        Schema::create('akce_availability', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('origin')->default(0);
            $table->string('name', 168)->unique();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('akce_availability');
    }
}