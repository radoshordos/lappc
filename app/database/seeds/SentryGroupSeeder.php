<?php

class SentryGroupSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->delete();

        Sentry::getGroupProvider()->create(array(
            'name' => 'Admins',
            'permissions' => array(
                'admin' => 1,
                'power' => 0,
                'simple' => 0,
            )));

        Sentry::getGroupProvider()->create(array(
            'name' => 'Test',
            'permissions' => array(
                'admin' => 1,
                'power' => 1,
                'simple' => 1,
            )));

    }

}