<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrabDb extends Migration
{

    public function up()
    {
        Schema::create('grab_db', function (Blueprint $table) {

            $table->increments('id')->unsigned()->primaty();
            $table->integer('profile_id')->unsigned();
            $table->tinyInteger('column_id')->unsigned();
            $table->integer('function_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->tinyInteger('position')->unsigned();
            $table->string('val1', '128');
            $table->string('val2', '128');

            $table->engine = 'InnoDB';
            $table->unique(['profile_id', 'column_id', 'position']);

            $table->foreign('profile_id')->references('id')->on('grab_profile')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('column_id')->references('id')->on('column_db')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('function_id')->references('id')->on('grab_function')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grab_db');
    }

}
