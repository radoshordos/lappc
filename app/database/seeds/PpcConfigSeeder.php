<?php


class PpcConfigSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_config')->delete();

        DB::table('ppc_config')->insert(array(
            'id' => 1,
            'email' => 'hordos@centrum.cz',
            'xmlfeed' => 'http://www.narex-makita.cz/cronx/zbozi.xml'
        ));

    }
}
