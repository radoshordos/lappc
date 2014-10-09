<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyncCsvColumn extends Migration
{

    public function up()
    {
        Schema::create('sync_csv_column', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned();
            $table->string('element', '32');
            $table->string('desc', '256')->nullable();

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('element');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sync_csv_column');
    }

}