<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePpcRules extends Migration
{

    public function up()
    {
        Schema::create('ppc_rules', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('modes', array('import', 'insert'))->default('import');
            $table->string('dev')->nullable();
            $table->tinyInteger('name_lenght_min')->unsigned()->nullable();
            $table->tinyInteger('name_lenght_max')->unsigned()->nullable();
            $table->tinyInteger('name_count_word_min')->unsigned()->nullable();
            $table->tinyInteger('name_count_word_max')->unsigned()->nullable();
            $table->tinyInteger('price_min')->unsigned()->nullable();
            $table->tinyInteger('price_max')->unsigned()->nullable();
            $table->enum('in_sell', array('YES', 'NO'))->nullable();
            $table->enum('in_action', array('YES', 'NO'))->nullable();
            $table->enum('ready_send', array('YES', 'NO'))->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique(array(
                'modes', 'dev',
                'name_lenght_min', 'name_lenght_max',
                'name_count_word_min', 'name_count_word_max',
                'price_min', 'price_max',
                'in_sell', 'in_action', 'ready_send'), 'ppc_rules_uniqe');

        });
    }

    public function down()
    {
        Schema::drop('ppc_rules');
    }

}