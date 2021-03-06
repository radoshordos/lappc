<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProdDifferenceSet extends Migration
{
    public function up()
    {
        Schema::create('prod_difference_set', function (Blueprint $table) {
            $table->smallInteger('id')->unsigned()->primary();
            $table->boolean('visible')->default(1);
            $table->string('name', '32')->unique();
            $table->string('sortby', '16')->default('id');
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('prod_difference_set');
    }
}