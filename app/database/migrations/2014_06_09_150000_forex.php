<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Forex extends Migration
{

    public function up()
    {
        Schema::create('forex', function (Blueprint $table) {

            $table->tinyInteger('id')->unsigned()->primary();
	        $table->boolean('active')->default(1);
            $table->string('code', 8)->unique();
            $table->string('currency',4);
            $table->string('cnb_date',16)->nulable();
            $table->double('exchange_rate');
            $table->tinyInteger('round_with')->unsigned();
            $table->tinyInteger('round_without')->unsigned();
	        $table->decimal('step',4,2)->unsigned();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('forex');
    }

}