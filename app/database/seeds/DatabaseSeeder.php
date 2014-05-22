<?php

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Eloquent::unguard();

        $this->call('SentryUserGroupSeeder');
        $this->call('SentryGroupSeeder');
        $this->call('SentryUserSeeder');

        $this->call('TreeGroupTopTableSeeder');
        $this->call('TreeGroupTableSeeder');
    }

}