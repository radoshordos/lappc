<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncRecord extends Migration
{

    public function up()
    {
        Schema::create('sync_record', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('template_id')->unsigned()->nullable();
            $table->integer('item_counter')->unsigned()->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('template_id')->references('id')->on('sync_csv_template')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sync_record');
    }

}