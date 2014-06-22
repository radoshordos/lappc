<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FeedType extends Migration
{

    public function up()
    {
        Schema::create('feed_type', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->string('code', '16');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('code');
        });
    }

    public function down()
    {
        Schema::drop('feed_type');
    }

}
