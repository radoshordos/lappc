<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemsAvailability extends Migration
{

    public function up()
    {
        Schema::create('items_availability', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->boolean('delivery_date')->nullable();
            $table->string('name', '64');

            $table->engine = 'InnoDB';
            $table->primary('id');
            $table->unique('name');
        });
    }

    public function down()
    {
        Schema::drop('items_availability');
    }

}