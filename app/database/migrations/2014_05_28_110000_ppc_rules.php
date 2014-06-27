<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PpcRules extends Migration
{

    public function up()
    {
        Schema::create('ppc_rules', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->tinyInteger('mode_id')->unsigned();
            $table->int('mixture_tree_id')->unsigned()->nullable();
            $table->int('mixture_dev_id')->unsigned()->nullable();
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
                'mode_id', 'mixture_tree_id', 'mixture_dev_id',
                'name_lenght_min', 'name_lenght_max',
                'name_count_word_min', 'name_count_word_max',
                'price_min', 'price_max',
                'in_sell', 'in_action', 'ready_send'), 'ppc_rules_uniqe');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppc_rules');
    }

}