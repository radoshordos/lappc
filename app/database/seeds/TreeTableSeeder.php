<?php

class TreeTableSeeder extends Seeder
{

    public function run()
    {

        $tree = [
            ['tree_id' => '1150000', 'tree_id_domain_only' => '0', 'tree_id_parent' => '0', 'tree_id_division' => '21', 'tree_id_gravity' => '1', 'tree_id_expansion' => '1', 'tree_id_dev_near' => NULL, 'tree_visible' => '1', 'tree_insert' => '0', 'tree_title' => 'Svítilny', 'tree_name' => 'Svítilny', 'tree_desc' => 'Svítilny', 'tree_abs_path' => 'svitilny/', 'tree_rel_path' => 'svitilny', 'tree_body' => NULL],
            ['tree_id' => '1150100', 'tree_id_domain_only' => '0', 'tree_id_parent' => '1150000', 'tree_id_division' => '21', 'tree_id_gravity' => '2', 'tree_id_expansion' => '1', 'tree_id_dev_near' => NULL, 'tree_visible' => '1', 'tree_insert' => '1', 'tree_title' => 'Akumulátorové svítilny', 'tree_name' => 'Akumulátorové svítilny', 'tree_desc' => 'Akumulátorové svítilny', 'tree_abs_path' => 'svitilny/akumulatorove-svitilny/', 'tree_rel_path' => 'akumulatorove-svitilny', 'tree_body' => NULL],
            ['tree_id' => '1150200', 'tree_id_domain_only' => '0', 'tree_id_parent' => '1150000', 'tree_id_division' => '21', 'tree_id_gravity' => '2', 'tree_id_expansion' => '1', 'tree_id_dev_near' => NULL, 'tree_visible' => '1', 'tree_insert' => '1', 'tree_title' => 'Čelové svítilny', 'tree_name' => 'Čelové svítilny', 'tree_desc' => 'Akumulátorové svítilny', 'tree_abs_path' => 'svitilny/celove-svitilny/', 'tree_rel_path' => 'celove-svitilny', 'tree_body' => NULL],
            ['tree_id' => '1150300', 'tree_id_domain_only' => '0', 'tree_id_parent' => '1150000', 'tree_id_division' => '21', 'tree_id_gravity' => '2', 'tree_id_expansion' => '1', 'tree_id_dev_near' => NULL, 'tree_visible' => '1', 'tree_insert' => '1', 'tree_title' => 'Elektrické svítilny', 'tree_name' => 'Elektrické svítilny', 'tree_desc' => 'Elektrické svítilny', 'tree_abs_path' => 'svitilny/elektricke-svitilny/', 'tree_rel_path' => 'elektricke-svitilny', 'tree_body' => NULL],
            ['tree_id' => '1150400', 'tree_id_domain_only' => '0', 'tree_id_parent' => '1150000', 'tree_id_division' => '21', 'tree_id_gravity' => '2', 'tree_id_expansion' => '1', 'tree_id_dev_near' => NULL, 'tree_visible' => '1', 'tree_insert' => '1', 'tree_title' => 'Ruční svítilny', 'tree_name' => 'Ruční svítilny', 'tree_desc' => 'Ruční svítilny', 'tree_abs_path' => 'svitilny/rucni-svitilny/', 'tree_rel_path' => 'rucni-svitilny', 'tree_body' => NULL],
            ['tree_id' => '1160000', 'tree_id_domain_only' => '0', 'tree_id_parent' => '0', 'tree_id_division' => '21', 'tree_id_gravity' => '1', 'tree_id_expansion' => '1', 'tree_id_dev_near' => NULL, 'tree_visible' => '1', 'tree_insert' => '1', 'tree_title' => 'Rázové utahováky', 'tree_name' => 'Utahováky', 'tree_desc' => 'Rázové utahováky', 'tree_abs_path' => 'razove-utahovaky/', 'tree_rel_path' => 'razove-utahovaky', 'tree_body' => NULL]
        ];


        DB::table('tree')->delete();

        DB::table('tree')->insert([
            'id'        => 21000000,
            'parent_id' => 21000000,
            'group_id'  => 21,
            'position'  => 0,
            'name'      => 'Root | Nářadí, nástroje',
            'desc'      => 'Root | Nářadí, nástroje',
            'relative'  => '',
            'absolute'  => ''
        ]);

        DB::table('tree')->insert([
            'id'        => 22000000,
            'parent_id' => 22000000,
            'group_id'  => 22,
            'position'  => 0,
            'name'      => 'Root | Zahradní technika',
            'desc'      => 'Root | Zahradní technika',
            'relative'  => '',
            'absolute'  => ''
        ]);

        DB::table('tree')->insert([
            'id'        => 23000000,
            'parent_id' => 23000000,
            'group_id'  => 23,
            'position'  => 0,
            'name'      => 'Root | Příslušenství',
            'desc'      => 'Root | Příslušenství',
            'relative'  => '',
            'absolute'  => ''
        ]);

        DB::table('tree')->insert([
            'id'        => 21020000,
            'parent_id' => 21000000,
            'group_id'  => 21,
            'position'  => 2,
            'name'      => 'Akumulátorové nářadí',
            'desc'      => 'Akumulátorové nářadí',
            'relative'  => 'akumulatorove-naradi',
            'absolute'  => 'akumulatorove-naradi'
        ]);

        DB::table('tree')->insert([
            'id'        => 21020200,
            'parent_id' => 21020000,
            'group_id'  => 21,
            'position'  => 2,
            'name'      => 'Aku šroubováky',
            'desc'      => 'Aku šroubováky',
            'relative'  => 'aku-sroubovaky',
            'absolute'  => 'akumulatorove-naradi/aku-sroubovaky'
        ]);

        DB::table('tree')->insert([
            'id'        => 21020400,
            'parent_id' => 21020000,
            'group_id'  => 21,
            'position'  => 4,
            'name'      => 'Aku úhlové vrtačky',
            'desc'      => 'Aku úhlové vrtačky',
            'relative'  => 'aku-uhlove-vrtacky',
            'absolute'  => 'akumulatorove-naradi/aku-uhlove-vrtacky'
        ]);

        DB::table('tree')->insert([
            'id'        => 21020600,
            'parent_id' => 21020000,
            'group_id'  => 21,
            'position'  => 4,
            'name'      => 'Aku brusky',
            'desc'      => 'Akumulátorové brusky',
            'relative'  => 'aku-uhlove-vrtacky',
            'absolute'  => 'akumulatorove-naradi/aku-uhlove-vrtacky'
        ]);

        foreach ($tree as $row) {

            DB::table('tree')->insert([
                'id'        => $row['tree_id'] + 20000000,
                'parent_id' => 21000000,
                'group_id'  => $row['tree_id_division'],
                'position'  => substr($row['tree_id'], 4, 2),
                'name'      => $row['tree_name'],
                'desc'      => $row['tree_title'],
                'relative'  => $row['tree_rel_path'],
                'absolute'  => $row['tree_abs_path']
            ]);
        }

        DB::statement('CALL proc_tree_recalculate');
    }
}

