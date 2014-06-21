<?php


class FeedDbTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('feed_db')->delete();

        DB::table('feed_db')->insert(array(
            'id' => 1,
            'type' => 'xmlfeed',
            'filename' => 'zbozi.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 2,
            'type' => 'xmlfeed',
            'filename' => 'heureka.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 3,
            'type' => 'xmlfeed',
            'filename' => 'hyperzbozi.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 4,
            'type' => 'xmlfeed',
            'filename' => 'univerzal.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 5,
            'type' => 'xmlfeed',
            'filename' => 'jyxo_vybereme.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 6,
            'type' => 'xmlsitemap',
            'filename' => 'sitemap.xml',
        ));

        DB::table('feed_db')->insert(array(
            'id' => 7,
            'type' => 'ppcfeed',
            'filename' => 'ppc.xml',
        ));
    }

}