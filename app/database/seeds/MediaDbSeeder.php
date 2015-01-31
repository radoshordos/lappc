<?php

class MediaDbSeeder extends Seeder
{
    public function run()
    {
        $media = [];
        include "migration/media.php";
        DB::table('media_db')->delete();

        foreach ($media as $row) {
            DB::table('media_db')->insert([
                'id'            => $row['media_id'],
                'variations_id' => $row['media_id_variace'],
                'visible'       => $row['media_visible'],
                'name'          => $row['media_name'],
                'source'        => $row['media_source'],
                'created_at'    => $row['media_ts_update'],
                'updated_at'    => $row['media_ts_update'],
            ]);
        }
    }
}

