<?php

class AkceTemplateSeeder extends Seeder
{
    public function run()
    {
        DB::table('akce_template')->delete();

        DB::table('akce_template')->insert(array(
            'mixture_dev_id' => 10,
            'availibility_id' => 1,
            'minitext_id' => 1,
            'endtime' => date_create("2014-09-30"),
            'bonus_title' => 'title',
            'bonus_text' => 'text',
            'created_at' => strtotime('now'),
            'updated_at' => strtotime('now')
        ));
    }
}
