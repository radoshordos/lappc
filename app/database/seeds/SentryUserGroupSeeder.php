<?php

class SentryUserGroupSeeder extends Seeder
{
    public function run()
    {
        DB::table('users_groups')->delete();

        $adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');
        $powerUser = Sentry::getUserProvider()->findByLogin('power@power.com');
        $simpleUser = Sentry::getUserProvider()->findByLogin('simple@simple.com');

        $adminGroup = Sentry::getGroupProvider()->findByName('Admins');
        $powerGroup = Sentry::getGroupProvider()->findByName('Power');
        $simpleGroup = Sentry::getGroupProvider()->findByName('Simple');

        $adminUser->addGroup($adminGroup);
        $adminUser->addGroup($powerGroup);
        $adminUser->addGroup($simpleGroup);

        $powerUser->addGroup($powerGroup);
        $powerUser->addGroup($simpleGroup);

        $simpleUser->addGroup($simpleGroup);
    }
}