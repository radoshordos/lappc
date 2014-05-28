<?php

class SentryUserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        Sentry::getUserProvider()->create(array(
            'email' => 'admin@admin.com',
            'password' => 'admin@admin.com',
            'activated' => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email' => 'power@power.com',
            'password' => 'power@power.com',
            'activated' => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email' => 'simple@simple.com',
            'password' => 'simple@simple.com',
            'activated' => 1,
        ));
    }
}