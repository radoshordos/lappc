<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Runner extends Migration
{
    public function up()
    {
        Schema::create('runner', function (Blueprint $table) {

            $table->smallInteger('id')->unsigned();
            $table->boolean("autorun")->default(1);
            $table->integer("autorun_minimim_range")->unsigned()->default(86400);
            $table->integer("autorun_first_run_day")->unsigned()->default(18000);
            $table->integer("last_run_automatic")->unsigned()->default(0);
            $table->integer("last_run_manual")->unsigned()->default(0);
            $table->string("class", "128");

            $table->engine = 'InnoDB';
            $table->unique('class');
        });
    }

    public function down()
    {
        Schema::dropIfExists('runner');
    }
}