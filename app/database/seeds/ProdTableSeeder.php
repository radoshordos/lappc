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

            if ($row['id'] % 3 ==0 && $tree > 0) {

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
                    'storeroom'     => rand(0,2),
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
            '1132160' => 22081200,
            '1133000' => 23020000,
            '1133040' => 23020200,
            '1133060' => 23020400,
            '1133080' => 23020600,
            '1133100' => 23020800,
            '1133120' => 23021000,
            '1133140' => 23021200,
            '1133160' => 23021400,
            '1133180' => 23021600,
            '1133200' => 23021800,
            '1133220' => 23022000,
            '1133260' => 23022200,
            '1133261' => 23022202,
            '1133263' => 23022204,
            '1133264' => 23022206,
            '1133265' => 23022208,
            '1133266' => 23022210,
            '1133268' => 23022212,
            '1133280' => 23022400,
            '1133281' => 23022402,
            '1133284' => 23022404,
            '1133288' => 23022406,
            '1133289' => 23022408,
            '1134020' => 28020000,
            '1134040' => 28040000,
            '1134080' => 28060000,
            '1134100' => 28080000,
            '1134120' => 28100000,
            '1134140' => 28120000,
            '1134160' => 28140000,
            '1134180' => 28160000,
            '1134181' => 28160200,
            '1134182' => 28160400,
            '1134200' => 28180000,
            '1134201' => 28180200,
            '1134202' => 28180400,
            '1134203' => 28180600,
            '1134205' => 28180800,
            '1134206' => 28181000,
            '1134207' => 28181200,
            '1134208' => 28181400,
            '1134220' => 28200000,
            '1134240' => 28220000,
            '1134260' => 28240000,
            '1134280' => 28260000,
            '1134300' => 28280000,
            '1134320' => 28300000,
            '1134322' => 28300200,
            '1134324' => 28300400,
            '1134325' => 28300600,
            '1134328' => 28300800,
            '1136000' => 29020000,
            '1136020' => 29020200,
            '1136040' => 29020400,
            '1136060' => 29020600,
            '1136080' => 29020800,
            '1136100' => 29021000,
            '1136120' => 29021200,
            '1136140' => 29021400,
            '1136160' => 29021600,
            '1136180' => 29021800,
            '1136200' => 29022000,
            '1136220' => 29022200,
            '1136240' => 29022400,
            '1137020' => 26020000,
            '1137021' => 26020200,
            '1137022' => 26020400,
            '1137023' => 26020600,
            '1137024' => 26020800,
            '1137040' => 26040000,
            '1137041' => 26040200,
            '1137043' => 26040400,
            '1137044' => 26040600,
            '1137045' => 26040800,
            '1137048' => 26041000,
            '1137060' => 26041200,
            '1137080' => 26060000,
            '1137081' => 26060200,
            '1137082' => 26060400,
            '1137083' => 26060600,
            '1137084' => 26060800,
            '1137085' => 26061000,
            '1137086' => 26061200,
            '1137087' => 26061400,
            '1137100' => 26061600,
            '1137120' => 26061800,
            '1137140' => 26062000,
            '1137160' => 26062200,
            '1137180' => 26062400,
            '1137200' => 26080000,
            '1137201' => 26080200,
            '1137202' => 26080400,
            '1137204' => 26080600,
            '1137207' => 26080800,
            '1137208' => 26081000,
            '1137220' => 26081200,
            '1137300' => 26081400,
            '1138000' => 22100000,
            '1139000' => 22120000,
            '1139020' => 22120200,
            '1139040' => 22120400,
            '1139060' => 22120600,
            '1139080' => 22120800,
            '1139100' => 22121000,
            '1139120' => 22121200,
            '1139122' => 22121202,
            '1139124' => 22121204,
            '1139125' => 22121206,
            '1139126' => 22121208,
            '1139128' => 22121210,
            '1139129' => 22121212,
            '1140000' => 22140000,
            '1140040' => 22140200,
            '1140080' => 22140400,
            '1140120' => 22140600,
            '1141000' => 22160000,
            '1142000' => 22180000,
            '1142020' => 22180200,
            '1142040' => 22180400,
            '1142060' => 22180600,
            '1142080' => 22180800,
            '1142100' => 22181000,
            '1142120' => 22181200,
            '1142140' => 22181400,
            '1142160' => 22181600,
            '1142180' => 22181800,
            '1142200' => 22182000,
            '1142220' => 22182200,
            '1142260' => 22182400,
            '1142300' => 22182600,
            '1144000' => 22200000,
            '1144020' => 22200200,
            '1144040' => 22200400,
            '1144060' => 22200600,
            '1144080' => 22200800,
            '1144100' => 22201000,
            '1144120' => 22201200,
            '1146000' => 23040000,
            '1146020' => 23040200,
            '1146060' => 23040400,
            '1146120' => 23040600,
            '1146160' => 23040800,
            '1146200' => 23041000,
            '1146202' => 23041002,
            '1146204' => 23041004,
            '1146206' => 23041006,
            '1146210' => 23041008,
            '1146212' => 23041010,
            '1146240' => 23041200,
            '1146320' => 23041400,
            '1146400' => 23041600,
            '1146560' => 23041800,
            '1146680' => 23042000,
            '1146720' => 23042200,
            '1148020' => 24020000,
            '1148040' => 24040000,
            '1148041' => 24020200,
            '1148043' => 24020400,
            '1148044' => 24020600,
            '1148047' => 24020800,
            '1148048' => 24021000,
            '1148050' => 24021200,
            '1148060' => 24060000,
            '1148063' => 24060200,
            '1148067' => 24060400,
            '1148080' => 24080000,
            '1148220' => 24100000,
            '1148222' => 24102000,
            '1148223' => 24104000,
            '1148224' => 24106000,
            '1148228' => 24108000,
            '1148240' => 24120000,
            '1148241' => 24120200,
            '1148242' => 24120400,
            '1148243' => 24120600,
            '1148244' => 24120800,
            '1148245' => 24121000,
            '1148246' => 24121200,
            '1148248' => 24121400,
            '1148260' => 24140000,
            '1148280' => 24160000,
            '1148300' => 24180000,
            '1148302' => 24180200,
            '1148304' => 24180400,
            '1148306' => 24180600,
            '1148308' => 24180800,
            '1148310' => 24181000,
            '1148320' => 24200000,
            '1148340' => 24220000,
            '1148341' => 24220200,
            '1148342' => 24220400,
            '1148343' => 24220600,
            '1148344' => 24220800,
            '1148346' => 24221000,
            '1148347' => 24221200,
            '1148380' => 24240000,
            '1148400' => 24260000,
            '1148420' => 24280000,
            '1148440' => 24300000,
            '1148460' => 24320000,
            '1148480' => 24340000,
            '1148500' => 24360000,
            '1148501' => 24360200,
            '1148502' => 24360400,
            '1148503' => 24360600,
            '1148504' => 24360800,
            '1148506' => 24361000,
            '1148507' => 24361200,
            '1148508' => 24361400,
            '1148509' => 24361600,
            '1149000' => 30040000,
            '1149020' => 30040200,
            '1149040' => 30040400,
            '1149060' => 30040600,
            '1154000' => 30060000,
            '1154020' => 30060200,
            '1154040' => 30060400,
            '1154060' => 30060600,
            '1154080' => 30060800,
            '1154100' => 30061000,
            '1154120' => 30061200,
            '1154140' => 30061400,
            '1154160' => 30061600,
            '1154200' => 30061800,
            '1154220' => 30062000,
            '1154240' => 30062200,
            '1154242' => 30062202,
            '1154244' => 30062204,
            '1154248' => 30062206,
            '1154252' => 30062208,
            '1154256' => 30062210
        ];

        return isset($arr[$tree]) ? $arr[$tree] : NULL;
    }

}