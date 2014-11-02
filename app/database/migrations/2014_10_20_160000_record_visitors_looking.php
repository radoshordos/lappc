<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RecordVisitorsLooking extends Migration
{

    public function up()
    {
        Schema::create('record_visitors_looking', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->dateTime('find_at');
            $table->string('filter_find', '64');
            $table->integer('count_dev')->unsigned()->default(0);
            $table->integer('count_prod')->unsigned()->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('record_visitors_looking');
    }

}