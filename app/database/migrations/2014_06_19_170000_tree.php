<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Tree extends Migration
{
    public function up()
    {
        Schema::create('tree', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->tinyInteger('group_id')->unsigned();
            $table->tinyInteger('position')->unsigned();
            $table->tinyInteger('deep')->unsigned()->nulable();

            $table->string('name','40');
            $table->string('desc','80');
            $table->string('relative','64');
            $table->string('absolute','256')->nulable();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->primary('id');

            $table->foreign('parent_id')->references('id')->on('tree')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('tree_group')->onUpdate('cascade')->onDelete('no action');
        });

        DB::statement('CALL tree_recalculate');
    }

    public function down()
    {
        Schema::drop('tree', function (Blueprint $table) {
            $table->dropForeign('parent_id');
            $table->dropForeign('group_id');
        });
    }

}