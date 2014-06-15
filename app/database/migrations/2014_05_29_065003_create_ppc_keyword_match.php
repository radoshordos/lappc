<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcKeywordMatch extends Migration
{

    public function up()
    {
        Schema::create('ppc_keywords_match', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned();
            $table->boolean('pozitive')->default(1);
            $table->string('code', 16)->unique();
            $table->string('string_before', 2);
            $table->string('string_after', 2);
            $table->string('desc', 128);

            $table->engine = 'InnoDB';
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::drop('ppc_keywords_match');
    }
}
