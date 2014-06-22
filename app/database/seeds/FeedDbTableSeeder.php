<?php


class FeedDbTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('feed_db')->delete();

        DB::table('feed_db')->insert(array(
            'id' => 1,
            'type_id' => 1,
            'filename' => 'zbozi.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 2,
            'type_id' => 1,
            'filename' => 'heureka.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 3,
            'type_id' => 1,
            'filename' => 'hyperzbozi.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 4,
            'type_id' => 1,
            'filename' => 'univerzal.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 5,
            'type_id' => 1,
            'filename' => 'jyxo_vybereme.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 6,
            'type_id' => 2,
            'filename' => 'sitemap.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 7,
            'type_id' => 3,
            'filename' => 'ppc.xml',
        ));
    }

}