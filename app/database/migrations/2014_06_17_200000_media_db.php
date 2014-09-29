<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MediaDb extends Migration
{

    public function up()
    {
        Schema::create('media_db', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('variations_id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->string('name', 255);
            $table->text('source')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('variations_id')->references('id')->on('media_variations')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_db');
    }

}
