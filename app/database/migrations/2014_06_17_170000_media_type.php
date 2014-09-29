<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MediaType extends Migration
{
    public function up()
    {
        Schema::create('media_type', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned()->primary();
            $table->boolean('visible_rule')->default(1);
            $table->string('name', 32)->unique();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_type');
    }

}
