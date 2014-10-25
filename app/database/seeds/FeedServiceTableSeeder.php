<?php


class FeedServiceTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('feed_service')->delete();

        DB::table('feed_service')->insert([
            'id'       => 11,
            'class'    => 'Authority\Feed\Shop\ZboziCz',
            'filename' => 'zbozi.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 12,
            'class'    => 'Authority\Feed\Shop\HeurekaCz',
            'filename' => 'heureka.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 13,
            'class'    => 'Authority\Feed\Shop\HyperzboziCz',
            'filename' => 'hyperzbozi.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 21,
            'class'    => 'Authority\Feed\Sitemap\Sitemap',
            'filename' => 'sitemap.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 31,
            'class'    => 'Authority\Feed\Ppc\Ppc',
            'filename' => 'ppc.xml',
        ]);
    }

}