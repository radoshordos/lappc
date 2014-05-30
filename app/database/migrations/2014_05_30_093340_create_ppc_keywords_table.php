<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcKeywordsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppc_keywords', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->Integer('sklik_id')->unsigned()->nullable();
            $table->tinyInteger('match_id')->unsigned();
            $table->String('name')->unique();
            $table->Integer('cpc')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ppc_keywords');
    }

}
