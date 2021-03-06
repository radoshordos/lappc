<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RecordSyncImport extends Migration
{
    public function up()
    {
        Schema::create('record_sync_import', function (Blueprint $table) {
            $table->integer('id')->primary()->unsigned();
            $table->integer('template_id')->unsigned()->nullable();
            $table->integer('mixture_dev_id')->unsigned()->nullable();
            $table->enum('purpose', ['manualsync', 'action', 'autosync', 'isystem']);
            $table->string('name', '48')->nullable();
            $table->integer('item_counter_all')->unsigned()->nullable();
            $table->integer('item_counter_insert')->unsigned()->default(0);
            $table->dateTime('created_at');

            $table->engine = 'InnoDB';
            $table->foreign('template_id')->references('id')->on('sync_csv_template')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mixture_dev_id')->references('id')->on('mixture_dev')->onUpdate('no action')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('record_sync_import');
    }
}