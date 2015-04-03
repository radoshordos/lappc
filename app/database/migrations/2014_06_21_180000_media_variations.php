<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MediaVariations extends Migration
{

    public function up()
    {
        Schema::create('media_variations', function (Blueprint $table) {

            $table->smallInteger('id')->unsigned()->primary();
            $table->tinyInteger('type_id')->unsigned();
            $table->boolean('visible_group')->default(0);
            $table->boolean('visible_media')->default(0);
            $table->boolean('visible_prod')->default(0);
            $table->string('tag', 24)->nullable();
            $table->string('name', 48);

            $table->engine = 'InnoDB';
            $table->foreign('type_id')->references('id')->on('media_type')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_variations');
    }

}