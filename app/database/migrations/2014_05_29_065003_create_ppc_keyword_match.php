<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcKeywordMatch extends Migration
{

    public function up()
    {
        Schema::create('ppc_keyword_match', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('pozitive')->default(1);
            $table->string('code', 16)->unique();
            $table->string('string_before', 2);
            $table->string('string_after', 2);
            $table->string('name', 2);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::drop('ppc_keyword_match');
    }

}
