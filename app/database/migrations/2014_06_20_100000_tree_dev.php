<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TreeDev extends Migration {

	public function up()
	{

		Schema::create('tree_dev', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->integer('tree_id')->unsigned();
            $table->integer('dev_id')->unsigned();
            $table->integer('subdir_all')->unsigned()->default(0);
            $table->integer('subdir_visible')->unsigned()->default(0);
            $table->integer('dir_all')->unsigned()->default(0);
            $table->integer('dir_visible')->unsigned()->default(0);

            $table->engine = 'InnoDB';
            $table->unique(array('tree_id', 'dev_id'));

            $table->foreign('tree_id')->references('id')->on('tree')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dev_id')->references('id')->on('dev')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	public function down()
	{
        Schema::drop('tree_dev', function (Blueprint $table) {
            $table->dropForeign('parent_id');
            $table->dropForeign('group_id');
        });
	}

}