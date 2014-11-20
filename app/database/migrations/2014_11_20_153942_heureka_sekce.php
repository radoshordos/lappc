<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HeurekaSekce extends Migration
{
    public function up()
    {
        Schema::create('heureka_sekce', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->primary();
            $table->string('category_name', 128)->unique();
            $table->string('category_fullname', 255)->unique()->nullable();
            $table->engine = 'InnoDB';
        });

    }


    public function down()
    {
        Schema::dropIfExists('heureka_sekce');
    }

}
