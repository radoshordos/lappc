<?php

class TreeGroupTopTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tree')->delete();
        DB::table('tree_group')->delete();
        DB::table('tree_group_top')->delete();

        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', [1, '[NULL]']);
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', [10, 'Úvodní strana']);
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', [20, 'Zboží']);
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', [50, 'Text']);
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', [80, 'Různé']);
        DB::insert('INSERT INTO tree_group_top (id, name) VALUES (?, ?)', [90, 'Nákupní košík']);

    }
}