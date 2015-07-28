<?php

class FeedServiceTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('feed_service')->delete();

        DB::table('feed_service')->insert([
            'id'       => 11,
            'execute'  => 'zbozi',
            'class'    => 'Authority\Feed\Shop\ZboziCz',
            'filename' => 'zbozi.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 12,
            'execute'  => 'heureka',
            'class'    => 'Authority\Feed\Shop\HeurekaCz',
            'filename' => 'heureka.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 13,
            'execute'  => 'hyperzbozi',
            'class'    => 'Authority\Feed\Shop\HyperzboziCz',
            'filename' => 'hyperzbozi.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 21,
            'execute'  => 'sitemap',
            'class'    => 'Authority\Feed\Sitemap\Sitemap',
            'filename' => 'sitemap.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 31,
            'execute'  => 'ppc',
            'class'    => 'Authority\Feed\Ppc\Ppc',
            'filename' => 'ppc.xml',
        ]);

        DB::table('feed_service')->insert([
            'id'       => 41,
            'execute'  => 'mobilstav',
            'class'    => 'Authority\Feed\Affiliate\Mobilstav',
            'filename' => 'mobilstav.xml',
        ]);
    }
}