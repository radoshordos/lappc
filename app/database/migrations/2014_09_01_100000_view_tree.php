<?php

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
                    tree.absolute AS tree_absolute,
                    tree_dev.subdir_all AS tree_subdir_all,
                    tree_dev.subdir_visible AS tree_subdir_visible,
                    tree_dev.dir_all AS tree_dir_all,
                    tree_dev.dir_visible AS tree_dir_visible
            FROM    tree
            INNER JOIN tree_dev ON tree_dev.tree_id = tree.id AND tree_dev.dev_id = 1
        ');
	}

	public function down()
	{
        DB::unprepared('DROP TABLE IF EXISTS view_tree');
	}

}