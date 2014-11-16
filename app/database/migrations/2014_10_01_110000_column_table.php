<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ColumnTable extends Migration
{

    public function up()
    {
        Schema::create('column_table', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned()->primary();
            $table->string('name', 32)->unique();

            $table->engine = 'InnoDB';
        });
    }


    public function down()
    {
        Schema::dropIfExists('column_table');
    }

}