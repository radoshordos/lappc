<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DevGroup extends Migration
{

    public function up()
    {

        Schema::create('dev_group', function (Blueprint $table) {

            $table->smallInteger('id')->unsigned();
            $table->string('name','32');

            $table->engine = 'InnoDB';
            $table->primary('id');
        });

    }

    public function down()
    {
        Schema::drop('dev_group');
    }

}