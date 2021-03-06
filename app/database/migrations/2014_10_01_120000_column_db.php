<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ColumnDb extends Migration
{
    public function up()
    {
        Schema::create('column_db', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned()->primary();
            $table->tinyInteger('table_id')->unsigned();
            $table->boolean('visible_grab')->default(1);
            $table->string('name', 32)->unique();

            $table->engine = 'InnoDB';
            $table->foreign('table_id')->references('id')->on('column_table')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists('column_db');
    }

}