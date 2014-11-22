<?php



class ProdTableSeeder extends Seeder
{

    public function run()
    {
        include "migration/prod.php";

        DB::table('prod')->delete();
        $now = strtotime('now');

        foreach ($prod as $row) {

            $tree = $this->getTree($row['tree_id']);

            if ($row['id'] % 5 == 1 && $tree > 0) {

                DB::table('prod')->insert([
                    'id'            => $row['id'],
                    'tree_id'       => $tree,
                    'dev_id'        => $row['dev_id'],
                    'warranty_id'   => $row['warranty_id'],
                    'dph_id'        => $row['dph_id'],
                    'mode_id'       => $row['mode_id'],
                    'difference_id' => $row['difference_id'],
                    'alias'         => $row['alias'],
                    'name'          => $row['name'],
                    'desc'          => $row['des'],
                    'img_big'       => $row['img_big'],
                    'img_normal'    => $row['img_normal'],
                    'price'         => $row['price'],
                    'created_at'    => date("Y-m-d H:i:s", $row['ti_create']),
                    'updated_at'    => $now
                ]);
            }
        }
    }


    function getTree($tree)
    {
        $arr = [
            '1109000' => 22020000,
            '1102000' => 17000000,
            '1103000' => 19000000,
            '1110020' => 21020000,
            '1110021' => 21020200,
            '1110022' => 21020400,
            '1110023' => 21020600,
            '1110024' => 21020800,
            '1110025' => 21021000,
            '1110026' => 21021200,
            '1110027' => 21021400,
            '1110028' => 21021600,
            '1110029' => 21021800,
            '1110030' => 21022000,
            '1110032' => 21024000,
            '1110040' => 21040000,
            '1110060' => 21060000,
            '1110080' => 21080000,
            '1110100' => 21100000,
            '1110120' => 21120000,
            '1110160' => 21140000,
            '1110180' => 21160000,
            '1110200' => 21180000,
            '1110240' => 21200000,
            '1112000' => 22040000,
            '1112100' => 22040200,
            '1112200' => 22040400,
            '1112300' => 22040600,
            '1112400' => 22040800,
            '1112500' => 22041000,
            '1114000' => 22060000,
            '1114020' => 22060200,
            '1114060' => 22060400,
            '1114080' => 22060600,
            '1114100' => 22060800,
            '1114120' => 22061000,
            '1114140' => 22061200,
            '1114180' => 22061400,
            '1114200' => 22061600,
            '1114220' => 22061800,
            '1114240' => 22062000,
            '1114260' => 22062200,
            '1114280' => 22062400,
            '1114320' => 22062600,
            '1114340' => 22062800,
            '1114360' => 22063000,
            '1114380' => 22063200,
            '1114400' => 22063400,
            '1116000' => 25040000,
            '1116040' => 25040200,
            '1116080' => 25040400,
            '1116100' => 25040600,
            '1116120' => 25040800,
            '1116200' => 25041000,
            '1116240' => 25041200,
            '1116242' => 25041202,
            '1116244' => 25041204,
            '1116246' => 25041206,
            '1116248' => 25041208,
            '1116320' => 25041400,
            '1116400' => 25041600,
            '1116420' => 25041800,
            '1116480' => 25042000,
            '1120000' => 27020000,
            '1120020' => 27020200,
            '1120040' => 27020400,
            '1120080' => 27020600,
            '1120120' => 27020800,
            '1120140' => 27021000,
            '1120180' => 27021200,
            '1120200' => 27021400,
            '1120240' => 27021600,
            '1120260' => 27021800,
            '1122000' => 30020000,
            '1122040' => 30020200,
            '1122042' => 30020202,
            '1122044' => 30020204,
            '1122080' => 30020400,
            '1122120' => 30020600,
            '1122160' => 30020800,
            '1124000' => 27040000,
            '1124100' => 27040200,
            '1124200' => 27040400,
            '1124300' => 27040600,
            '1124400' => 27040800,
            '1124500' => 27041000,
            '1124600' => 27041200,
            '1124700' => 27041400,
            '1124800' => 27041600,
            '1124900' => 27041800,
            '1126000' => 25080000,
            '1132000' => 22080000,
            '1132020' => 22080200,
            '1132060' => 22080400,
            '1132080' => 22080600,
            '1132100' => 22080800,
            '1132140' => 22081000,
            '1132160' => 22081200
        ];

        return isset($arr[$tree]) ? $arr[$tree] : NULL;
    }

}