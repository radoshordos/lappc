<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PpcDb extends Migration
{
    public function up()
    {
        Schema::create('ppc_db', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('feed_id')->default(1)->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('dev_id');
            $table->string('tree_id');
            $table->string('url', 128);
            $table->string('name', 40);
            $table->decimal('price', 9, 2)->unsigned();
            $table->boolean('action')->default(0);
            $table->boolean('market')->default(0);
            $table->boolean('send')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique(['feed_id', 'item_id']);
            $table->unique(['feed_id', 'name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_db');
    }
}