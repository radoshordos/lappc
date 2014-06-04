<?php

class AdminRunnerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('runner')->delete();

        Sentry::getUserProvider()->create(array(
            'id' => 'admin@admin.com',
            'autorun' => 1,
            'alias' => 'keydb',
            'command' => 'command:ppc:keyword-db',
        ));

    }
}