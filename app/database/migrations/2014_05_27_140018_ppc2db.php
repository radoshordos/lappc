<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ppc2db extends Migration
{
    public function up()
    {
        Schema::create('ppc_db', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('manufacturer')->nullable();
            $table->string('name');
            $table->decimal('price', 9, 2)->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('item_id');
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::drop('ppc_db');
    }
}