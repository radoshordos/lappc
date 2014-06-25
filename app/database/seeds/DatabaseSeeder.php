<?php

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // ADMIN ROLES
        $this->call('SentryGroupSeeder');
        $this->call('SentryUserSeeder');
        $this->call('SentryUserGroupSeeder');

        // CISELNIKY
        $this->call('PpcKeywordsMatchTableSeeder');
        $this->call('ProdWarrantyTableSeeder');
        $this->call('ItemsSaleTableSeeder');
        $this->call('ItemsAvailabilityTableSeeder');
        $this->call('TreeGroupTopTableSeeder');
        $this->call('TreeGroupTableSeeder');
        $this->call('ProdModeTableSeeder');

        // OSTATNI
        $this->call('FeedServiceTableSeeder');
        $this->call('PpcConfigSeeder');
        $this->call('PpcDbModeTableSeeder');
        $this->call('PpcKeywordsTableSeeder');
        $this->call('AdminRunnerTableSeeder');

        $this->call('DevTableSeeder');
        $this->call('DevGroupTableSeeder');
        $this->call('TreeTableSeeder');
        $this->call('DevM2nGroupTableSeeder');

        $this->call('ProdTableSeeder');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}