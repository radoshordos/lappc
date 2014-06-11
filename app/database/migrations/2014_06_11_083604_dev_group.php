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
            $table->string('desc','256')->nullable();

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('name');
        });

    }

    public function down()
    {
        Schema::drop('dev_group');

    }

}