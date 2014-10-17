<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordFind extends Migration
{

    public function up()
    {
        Schema::create('record_find', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->dateTime('find_at');
            $table->string('filter_find', '64');
            $table->integer('count_dev')->unsigned()->default(0);
            $table->integer('count_prod')->unsigned()->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('record_find');
    }

}