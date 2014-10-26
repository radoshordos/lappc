<?php

use Illuminate\Database\Migrations\Migration;

class MixtureItem extends Migration
{

    public function up()
    {
        Schema::create('mixture_item', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('purpose', ['akce_items_free']);
            $table->string('name', '160')->unique();

            $table->engine = 'InnoDB';
        });
    }


    public function down()
    {
        Schema::dropIfExists('mixture_item');
    }

}