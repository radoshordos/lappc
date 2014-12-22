<?php

class AkceTemplateSeeder extends Seeder
{
    public function run()
    {
        DB::table('akce_template')->delete();

        DB::table('akce_template')->insert([
            'id'              => 1,
            'mixture_dev_id'  => 10,
            'availability_id' => 1,
            'minitext_id'     => 1,
            'endtime'         => date_create("2028-01-01"),
            'bonus_title'     => '[NULL]',
            'bonus_text'      => NULL,
            'created_at'      => strtotime('now'),
            'updated_at'      => strtotime('now')
        ]);

        DB::table('akce_template')->insert([
            'mixture_dev_id'  => 10,
            'availability_id' => 1,
            'minitext_id'     => 1,
            'endtime'         => date_create("2014-09-30"),
            'bonus_title'     => 'title',
            'bonus_text'      => 'text',
            'created_at'      => strtotime('now'),
            'updated_at'      => strtotime('now')
        ]);
    }
}
