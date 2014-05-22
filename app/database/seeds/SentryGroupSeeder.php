<?php

class SentryGroupSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->delete();

        Sentry::getGroupProvider()->create(array(
            'name' => 'Admins',
            'is_origin' => 1,
            'permissions' => array(
                'admin' => 1,
                'power' => 0,
                'simple' => 0,
            )));

        Sentry::getGroupProvider()->create(array(
            'name' => 'Power',
            'is_origin' => 1,
            'permissions' => array(
                'admin' => 1,
                'power' => 1,
                'simple' => 0,
            )));

        Sentry::getGroupProvider()->create(array(
            'name' => 'Simple',
            'is_origin' => 1,
            'permissions' => array(
                'admin' => 1,
                'power' => 1,
                'simple' => 1,
            )));
    }
}