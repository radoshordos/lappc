<?php

class GrabModeSeeder extends Seeder
{

    public function run()
    {

        $filter2mode = [
            ['fm_id' => '1', 'fm_alias' => 'mixed', 'fm_name' => 'Mixed'],
            ['fm_id' => '2', 'fm_alias' => 'string', 'fm_name' => 'String'],
            ['fm_id' => '3', 'fm_alias' => 'array', 'fm_name' => 'Array'],
            ['fm_id' => '4', 'fm_alias' => 'string2arrays', 'fm_name' => 'String2Arrays'],
            ['fm_id' => '5', 'fm_alias' => 'arrays2string', 'fm_name' => 'Arrays2String']
        ];

        DB::table('grab_mode')->delete();

        foreach ($filter2mode as $row) {

            DB::table('grab_mode')->insert([
                'id'    => $row['fm_id'],
                'alias' => $row['fm_alias'],
                'name'  => $row['fm_name'],
            ]);
        }
    }

}