<?php

class TreeGroupTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tree')->delete();
        DB::table('tree_group')->delete();

        DB::table('tree_group')->insert(array(
            'id' => 1,
            'grouptop_id' => 1,
            'type' => 'null',
            'name' => '[NULL]'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 11,
            'grouptop_id' => 10,
            'type' => 'homepage',
            'name' => 'Úvodní strana'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 21,
            'grouptop_id' => 20,
            'for_prod' => 1,
            'type' => 'prodlist',
            'name' => 'Nářadí, nástroje'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 22,
            'grouptop_id' => 20,
            'for_prod' => 1,
            'type' => 'prodlist',
            'name' => 'Zahradní technika'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 23,
            'grouptop_id' => 20,
            'for_prod' => 1,
            'type' => 'prodlist',
            'name' => 'Příslušenství'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 26,
            'grouptop_id' => 20,
            'type' => 'prodfind',
            'name' => 'Vyhledánání'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 27,
            'grouptop_id' => 20,
            'type' => 'prodaction',
            'name' => 'Akce'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 28,
            'grouptop_id' => 20,
            'type' => 'prodaction',
            'name' => 'Výprodej'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 29,
            'grouptop_id' => 20,
            'type' => 'prodaction',
            'name' => 'Novinky'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 31,
            'grouptop_id' => 30,
            'type' => 'text',
            'name' => 'Text'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 32,
            'grouptop_id' => 30,
            'type' => 'textdev',
            'name' => 'Text o výrobcích'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 39,
            'grouptop_id' => 30,
            'type' => 'textterms',
            'name' => 'Obchodní podmínky'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 51,
            'grouptop_id' => 50,
            'type' => 'textrules',
            'name' => 'Mapa webu'
        ));

        DB::table('tree_group')->insert(array(
            'id' => 91,
            'grouptop_id' => 90,
            'type' => 'buybox',
            'name' => 'Nákupní košík'
        ));
    }

}