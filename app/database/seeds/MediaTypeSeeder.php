<?php

class MediaTypeSeeder extends Seeder
{

    public function run()
    {
        $media2type = [
            ['mt_id' => '1', 'mt_visible_rule' => '1', 'mt_name' => '[NULL]'],
            ['mt_id' => '2', 'mt_visible_rule' => '1', 'mt_name' => 'Pouze text'],
            ['mt_id' => '3', 'mt_visible_rule' => '1', 'mt_name' => 'Soubor'],
            ['mt_id' => '4', 'mt_visible_rule' => '1', 'mt_name' => 'Video'],
            ['mt_id' => '5', 'mt_visible_rule' => '1', 'mt_name' => 'Systemové'],
            ['mt_id' => '6', 'mt_visible_rule' => '1', 'mt_name' => 'Seskupení'],
            ['mt_id' => '7', 'mt_visible_rule' => '0', 'mt_name' => 'Informace o produktu'],
            ['mt_id' => '8', 'mt_visible_rule' => '0', 'mt_name' => 'MultiObrázek']
        ];

        DB::table('media_type')->delete();

        foreach ($media2type as $row) {

            DB::table('media_type')->insert([
                'id'           => $row['mt_id'],
                'visible_rule' => $row['mt_visible_rule'],
                'name'         => $row['mt_name'],
            ]);
        }
    }
}
