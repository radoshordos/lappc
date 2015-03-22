<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EndAfterAllTables extends Migration
{
    public function up()
    {
        Schema::table('media_db', function (Blueprint $table) {
            $table->foreign('variations_id')->references('id')->on('media_variations')->onUpdate('cascade')->onDelete('no action');
            $table->foreign('mixture_dev_id')->references('id')->on('mixture_dev')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('mixture_prod_id')->references('id')->on('mixture_prod')->onUpdate('cascade')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_db');
    }
}