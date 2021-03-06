<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PpcConfig extends Migration
{
    public function up()
    {
        Schema::create('ppc_config', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->string('email')->unique();
            $table->string('xmlfeed');
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_config');
    }

}
