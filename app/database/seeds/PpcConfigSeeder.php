<?php


class PpcConfigSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppc_config')->delete();

        DB::insert('
            INSERT INTO ppc_config (id, email, xmlfeed)
            VALUES (?, ?, ?)',
            array(1, 'hordos@centrum.cz', 'http://www.narex-makita.cz/cronx/zbozi.xml')
        );
    }
}
