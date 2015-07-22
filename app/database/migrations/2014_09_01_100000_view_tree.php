<?php

use Illuminate\Database\Migrations\Migration;

class ViewTree extends Migration
{
    public function up()
    {
        DB::unprepared('DROP TABLE IF EXISTS view_tree');
        DB::unprepared('
            CREATE OR REPLACE VIEW
            view_tree AS
            SELECT  tree.id AS tree_id,
                    tree.parent_id AS tree_parent_id,
                    tree.deep AS tree_deep,
                    tree.name AS tree_name,
                    tree.desc AS tree_desc,
                    tree.relative AS tree_relative,
                    tree.absolute AS tree_absolute,
                    tree.category_text AS tree_category_text,
                    tree.category_nav AS tree_category_nav,
                    tree.category_menu AS tree_category_menu,
                    tree.picture AS tree_picture,
                    tree_dev.subdir_all AS tree_subdir_all,
                    tree_dev.subdir_visible AS tree_subdir_visible,
                    tree_dev.dir_all AS tree_dir_all,
                    tree_dev.dir_visible AS tree_dir_visible,
                    tree_group.id AS tree_group_id,
                    tree_group.type AS tree_group_type,
                    tree_group.name AS tree_group_name
            FROM    tree
            INNER JOIN tree_dev ON tree_dev.tree_id = tree.id AND tree_dev.dev_id = 1
            INNER JOIN tree_group ON tree_group.id = tree.group_id
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TABLE IF EXISTS view_tree');
    }
}