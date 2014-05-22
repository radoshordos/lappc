<?php

class SentryUserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        Sentry::getUserProvider()->create(array(
            'email' => 'admin@admin.com',
            'password' => 'sentryadmin',
            'activated' => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email' => 'power@power.com',
            'password' => 'sentryuser',
            'activated' => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email' => 'simple@simple.com',
            'password' => 'sentryuser',
            'activated' => 1,
        ));
    }
}