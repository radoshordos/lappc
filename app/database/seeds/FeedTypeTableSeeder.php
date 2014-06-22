<?php

class FeedTypeTableSeeder extends Seeder {

	public function run()
	{
        DB::table('feed_type')->delete();

        DB::table('feed_type')->insert(array(
            'id' => 1,
            'code' => 'shopfeed'
        ));

        DB::table('feed_type')->insert(array(
            'id' => 2,
            'code' => 'sitemap'
        ));

        DB::table('feed_type')->insert(array(
            'id' => 3,
            'code' => 'ppcfeed'
        ));
	}
}