<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncImportRecord extends Migration
{

    public function up()
    {
        Schema::create('sync_import_record', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('template_id')->unsigned()->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('template_id')->references('id')->on('sync_csv_template')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sync_import_record');
    }

}