<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ViewTree extends Migration {


	public function up()
	{
        DB::unprepared('DROP TABLE IF EXISTS view_tree');

        DB::unprepared('
            CREATE OR REPLACE VIEW
            view_tree AS
            SELECT  tree.id AS tree_id,
                    tree.name AS tree_name,
                    tree.desc AS tree_desc,
                    tree_dev.subdir_all AS tree_subdir_all
            FROM    tree
            INNER JOIN tree_dev ON tree_dev.tree_id = tree.id AND tree_dev.dev_id = 1
        ');
	}


	public function down()
	{
        DB::unprepared('DROP TABLE IF EXISTS view_tree');
	}

}
