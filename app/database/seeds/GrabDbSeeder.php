<?php

class GrabDbSeeder extends Seeder
{
    public function run()
    {
        $grab_db = [
            ['id' => '440', 'profile_id' => '62', 'column_id' => '14', 'function_id' => '1', 'active' => '1', 'position' => '2', 'val1' => '<ul class="produkt-argumenty">', 'val2' => '</ul>'],
            ['id' => '441', 'profile_id' => '62', 'column_id' => '14', 'function_id' => '21', 'active' => '1', 'position' => '4', 'val1' => '</li>', 'val2' => ''],
            ['id' => '443', 'profile_id' => '62', 'column_id' => '14', 'function_id' => '10', 'active' => '1', 'position' => '6', 'val1' => '', 'val2' => ''],
            ['id' => '444', 'profile_id' => '62', 'column_id' => '14', 'function_id' => '16', 'active' => '1', 'position' => '8', 'val1' => '', 'val2' => ''],
            ['id' => '445', 'profile_id' => '62', 'column_id' => '14', 'function_id' => '13', 'active' => '1', 'position' => '10', 'val1' => '', 'val2' => ''],
            ['id' => '446', 'profile_id' => '62', 'column_id' => '14', 'function_id' => '22', 'active' => '1', 'position' => '12', 'val1' => 'LINE', 'val2' => ''],
            ['id' => '447', 'profile_id' => '62', 'column_id' => '13', 'function_id' => '11', 'active' => '1', 'position' => '1', 'val1' => '702', 'val2' => ''],
            ['id' => '448', 'profile_id' => '62', 'column_id' => '12', 'function_id' => '1', 'active' => '1', 'position' => '1', 'val1' => 'Technická data</th></tr>', 'val2' => '</table>'],
            ['id' => '449', 'profile_id' => '62', 'column_id' => '12', 'function_id' => '10', 'active' => '1', 'position' => '3', 'val1' => '', 'val2' => ''],
            ['id' => '451', 'profile_id' => '62', 'column_id' => '12', 'function_id' => '21', 'active' => '1', 'position' => '5', 'val1' => '', 'val2' => ''],
            ['id' => '452', 'profile_id' => '62', 'column_id' => '12', 'function_id' => '16', 'active' => '1', 'position' => '6', 'val1' => '', 'val2' => ''],
            ['id' => '454', 'profile_id' => '62', 'column_id' => '12', 'function_id' => '13', 'active' => '1', 'position' => '8', 'val1' => '', 'val2' => ''],
            ['id' => '455', 'profile_id' => '62', 'column_id' => '12', 'function_id' => '15', 'active' => '1', 'position' => '9', 'val1' => ' : ', 'val2' => ''],
            ['id' => '456', 'profile_id' => '62', 'column_id' => '12', 'function_id' => '22', 'active' => '1', 'position' => '12', 'val1' => 'LINE', 'val2' => ''],
            ['id' => '457', 'profile_id' => '62', 'column_id' => '2', 'function_id' => '1', 'active' => '1', 'position' => '1', 'val1' => '<input type="hidden" name="objcis" value="', 'val2' => '">'],
            ['id' => '458', 'profile_id' => '62', 'column_id' => '2', 'function_id' => '64', 'active' => '1', 'position' => '2', 'val1' => 'db', 'val2' => ''],
            ['id' => '459', 'profile_id' => '62', 'column_id' => '52', 'function_id' => '61', 'active' => '1', 'position' => '3', 'val1' => 'db', 'val2' => 'code_prod'],
            ['id' => '460', 'profile_id' => '62', 'column_id' => '10', 'function_id' => '61', 'active' => '1', 'position' => '4', 'val1' => 'db', 'val2' => 'name'],
            ['id' => '461', 'profile_id' => '62', 'column_id' => '23', 'function_id' => '61', 'active' => '1', 'position' => '1', 'val1' => 'db', 'val2' => 'desc']
        ];

        DB::table('grab_db')->delete();
        foreach ($grab_db as $row) {

            DB::table('grab_db')->insert([
                'id'          => $row['id'],
                'profile_id'  => $row['profile_id'],
                'column_id'   => $row['column_id'],
                'function_id' => $row['function_id'],
                'active'      => $row['active'],
                'position'    => $row['position'],
                'val1'        => $row['val1'],
                'val2'        => $row['val2'],
            ]);
        }
    }
}