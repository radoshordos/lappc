<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdDifference extends Migration
{

    public function up()
    {
        Schema::create('prod_difference', function (Blueprint $table) {

            $table->integer('id')->unsigned()->primary();
            $table->boolean('visible')->default(1);
            $table->tinyInteger('count')->unsigned();
            $table->string('name', 48)->unique();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('prod_difference');
    }

}