<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProdDifference extends Migration
{

    public function up()
    {
        Schema::create('prod_difference', function (Blueprint $table) {

            $table->smallInteger('id')->unsigned()->primary();
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