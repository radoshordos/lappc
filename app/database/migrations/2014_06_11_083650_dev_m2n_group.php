<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DevM2nGroup extends Migration
{

    public function up()
    {
        Schema::create('dev_m2n_group', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->integer('dev_id')->unsigned();

            $table->engine = 'InnoDB';
            $table->unique(array('group_id', 'dev_id'));

            $table->foreign('group_id')->references('id')->on('dev_group')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dev_id')->references('id')->on('dev')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dev_m2n_group', function (Blueprint $table) {
            $table->dropForeign('group_id');
            $table->dropForeign('dev_id');
        });
    }

}