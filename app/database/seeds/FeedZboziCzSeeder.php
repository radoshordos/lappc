<?php

class FeedZboziCzSeeder extends Seeder
{

    public function run()
    {
        DB::table('feed_zbozi_cz')->delete();

        $data = file_get_contents(__DIR__ . '/migration/feed_zbozi_cz.csv');
        $line = explode("\r\n", $data);
        foreach ($line as $val) {
            $col = explode(";", $val);

            DB::table('feed_zbozi_cz')->insert([
                'category'    => $col[0],
                'name'        => $col[1],
                'destination' => $col[2]
            ]);
        }
    }
}