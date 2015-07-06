<?php

class TreeTextSeeder extends Seeder
{
    public function run()
    {
        $tree_text = [];
        include "migration/tree_text.php";
        DB::table('tree_text')->delete();

        foreach ($tree_text as $row) {
            DB::table('tree_text')->insert([
                'id'      => $row['id'],
                'tree_id' => $row['tree_id'],
                'text'    => $row['text']
            ]);
        }
    }
}