<?php

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Eloquent::unguard();

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
  /*      $this->call('TreeGroupTableSeeder');

        // OSTATNI
        $this->call('PpcConfigSeeder');
        $this->call('PpcDbModeTableSeeder');
        $this->call('PpcKeywordsTableSeeder');
        $this->call('AdminRunnerTableSeeder');
        $this->call('DevTableSeeder');
        $this->call('DevGroupTableSeeder');
        $this->call('DevM2nGroupTableSeeder');

        $this->call('TreeTableSeeder');
    */}
}