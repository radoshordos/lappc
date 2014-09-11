<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordFind extends Migration
{

    public function up()
    {
        Schema::create('record_find', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->dateTime('find_at');
            $table->string('filter_find', '64');
            $table->integer('count_dev')->unsigned();
            $table->integer('count_prod')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('record_find');
    }

}