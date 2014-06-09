<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ppc2db extends Migration
{
    public function up()
    {
        Schema::create('ppc_db', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->string('manufacturer');
            $table->string('name');
            $table->decimal('price', 9, 2)->unsigned();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::drop('ppc_db');
    }
}