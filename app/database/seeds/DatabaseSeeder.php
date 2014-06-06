<?php

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Eloquent::unguard();

        $this->call('SentryGroupSeeder');
        $this->call('SentryUserSeeder');
        $this->call('SentryUserGroupSeeder');

        $this->call('TreeGroupTopTableSeeder');
        $this->call('TreeGroupTableSeeder');

        $this->call('PpcConfigSeeder');
//        $this->call('PpcKeywordsMatchTableSeeder');
//        $this->call('PpcKeywordsTableSeeder');

        $this->call('AdminRunnerTableSeeder');

    }

}