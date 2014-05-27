<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ppc2db extends Migration
{
    /*

    INSERT INTO `em2db` (`

    `ed_id_campaign`,
    `ed_id_mode`,
    `ed_param_name_count`,
    `ed_param_name_word`,
    `ed_param_price`,
    `ed_param_sell`,
    `ed_param_action`,
    `ed_param_sendnow`,
    `ed_param_index`,
    `ed_prod_id`,
    `ed_tree_id`,
    `ed_dev_id`
    ) VALUES

    */
    public function up()
    {
        Schema::create('ppc_db', function ($table) {

            $table->increments('id')->unsigned();
            $table->date('created_at');
            $table->string('manufacturer');
            $table->string('name');
            $table->decimal('price', 7, 2);
            $table->string('imgurl');
            $table->engine = 'InnoDB';
        });
    }


    public function down()
    {
        Schema::drop('ppc_db');
    }

}