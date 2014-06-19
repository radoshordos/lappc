<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TreeGroup extends Migration
{

    public function up()
    {
        Schema::create('tree_group', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned();
            $table->tinyInteger('grouptop_id')->unsigned();
            $table->boolean('visible')->default(1);
            $table->boolean('for_prod')->default(0);
            $table->string('type', '16');
            $table->string('name', '32');

            $table->engine = 'InnoDB';
            $table->primary('id');

            //      $table->foreign('group_top_id')->references('id')->on('tree_group_top')->onUpdate('cascade')->onDelete('no action');
        });
    }

    public function down()
    {
        Schema::drop('tree_group');
        //Schema::drop('tree_group', function (Blueprint $table) {
        //$table->dropForeign('group_top_id');
        //});
    }
}