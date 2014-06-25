<?php


class FeedServiceTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('feed_service')->delete();

        DB::table('feed_service')->insert(array(
            'id' => 11,
            'filename' => 'zbozi.xml',
        ));

        DB::table('feed_service')->insert(array(
            'id' => 12,
            'filename' => 'heureka.xml',
        ));

        DB::table('feed_service')->insert(array(
            'id' => 13,
            'filename' => 'hyperzbozi.xml',
        ));

        DB::table('feed_service')->insert(array(
            'id' => 21,
            'filename' => 'sitemap.xml',
        ));

        DB::table('feed_service')->insert(array(
            'id' => 31,
            'filename' => 'ppc.xml',
        ));
    }

}