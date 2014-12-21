<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemsAvailability extends Migration
{

    public function up()
    {
        Schema::create('items_availability', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned()->primary();
            $table->boolean('visible')->default(1);
            $table->boolean('delivery_date')->nullable();
            $table->string('name', '64')->unique();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('items_availability');
    }

}