<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ppc2config extends Migration
{
    public function up()
    {
        Schema::create('ppc_config', function ($table) {

            $table->increments('id')->unsigned();
            $table->string('email');
            $table->string('xmlfeed');
            $table->engine = 'InnoDB';
        });
    }


    public function down()
    {
        Schema::drop('ppc_config');
    }

}
