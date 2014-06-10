<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcKeywordMatch extends Migration
{

    const DB_PPC_KEYWORDS_MATCH = 'ppc_keywords_match';

    public function up()
    {
        Schema::create(self::DB_PPC_KEYWORDS_MATCH, function (Blueprint $table) {
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
        Schema::drop(self::DB_PPC_KEYWORDS_MATCH);
    }
}
