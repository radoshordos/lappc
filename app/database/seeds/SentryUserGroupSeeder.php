<?php

class SentryUserGroupSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_groups')->delete();

        $adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');
//        $userUser = Sentry::getUserProvider()->findByLogin('user@user.com');

        $adminGroup = Sentry::getGroupProvider()->findByName('Admins');
//		$userGroup = Sentry::getGroupProvider()->findByName('Users');

        // Assign the groups to the users

        $adminUser->addGroup($adminGroup);
//        $adminUser->addGroup($userGroup);
//        $userUser->addGroup($userGroup);

    }

}