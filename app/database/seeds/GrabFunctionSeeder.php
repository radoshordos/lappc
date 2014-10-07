<?php

class GrabFunctionSeeder extends Seeder
{

    public function run()
    {

        $filter2type = [
            ['ft_id' => '1', 'ft_id_mode' => '2', 'ft_visible' => '1', 'ft_function_name' => 'loadSimpleCutString', 'ft_function' => 'loadSimpleCutString($data,$start,$end)', 'ft_name' => 'Načtení zvolené části řetězce.'],
            ['ft_id' => '2', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'concateString', 'ft_function' => 'concateString($source,$begin,$end)', 'ft_name' => 'Připojí řetězec zleva a z prava'],
            ['ft_id' => '3', 'ft_id_mode' => '2', 'ft_visible' => '1', 'ft_function_name' => 'csUtf2Ascii', 'ft_function' => 'csUtf2Ascii($string)', 'ft_name' => 'Odstranění české diakritiky s podporpou UTF-8'],
            ['ft_id' => '4', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'strReplace', 'ft_function' => 'strReplace($mixed,$from,$to)', 'ft_name' => 'Nahradit všechny výskyty jednoho řetězce dalším řetězcem'],
            ['ft_id' => '5', 'ft_id_mode' => '2', 'ft_visible' => '1', 'ft_function_name' => 'createAliasName', 'ft_function' => 'createAliasName($string)', 'ft_name' => 'Úprava řeřězce na alias-name. Používá se pří tvorbě zboží.'],
            ['ft_id' => '7', 'ft_id_mode' => '2', 'ft_visible' => '1', 'ft_function_name' => 'filterSanitizeSpecialCharts', 'ft_function' => 'filterSanitizeSpecialCharts($string)', 'ft_name' => 'Filtování nestandartních ASCII znaků a zvolených entit'],
            ['ft_id' => '9', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'clearMultiSpace', 'ft_function' => 'clearMultiSpace($mixed)', 'ft_name' => 'Odstraní více mezer mezi znaky'],
            ['ft_id' => '10', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'stripTags', 'ft_function' => 'stripTags($mixed)', 'ft_name' => 'Odstranit z řetězce HTML a PHP tagy'],
            ['ft_id' => '11', 'ft_id_mode' => '2', 'ft_visible' => '1', 'ft_function_name' => 'setValueToColumn', 'ft_function' => 'setValueToColumn($value1)', 'ft_name' => 'Nastaví zadanou hodnotu'],
            ['ft_id' => '13', 'ft_id_mode' => '3', 'ft_visible' => '1', 'ft_function_name' => 'clearEmptyRows', 'ft_function' => 'clearEmptyRows($array)', 'ft_name' => 'Odstranění prázdných sloupců'],
            ['ft_id' => '15', 'ft_id_mode' => '3', 'ft_visible' => '1', 'ft_function_name' => 'togeterTwoColumn', 'ft_function' => 'togeterTwoColumn($array, $glue)', 'ft_name' => 'Spojí 2 pole [N a N+1]  do sebe oddělovačem'],
            ['ft_id' => '16', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'trim', 'ft_function' => 'trim($mixed)', 'ft_name' => 'Odstranit netisknutelné znaky'],
            ['ft_id' => '17', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'ucfirst', 'ft_function' => 'ucfirst($mixed)', 'ft_name' => 'Změní první písmeno řetězce na velké'],
            ['ft_id' => '18', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'strToUpper', 'ft_function' => 'strToUpper($mixed)', 'ft_name' => 'Změnit řetězec na velká písmena '],
            ['ft_id' => '19', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'strToLower', 'ft_function' => 'strToLower($mixed)', 'ft_name' => 'Změnit řetězec na malá písmena'],
            ['ft_id' => '20', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'ifStrlenIsBigerReturn', 'ft_function' => 'ifStrlenIsBigerReturn($string,$int,$str)', 'ft_name' => 'Pokud je řetězec větší ($int) vrať hodnotu ($str)'],
            ['ft_id' => '21', 'ft_id_mode' => '4', 'ft_visible' => '1', 'ft_function_name' => 'explode2ColumArrays', 'ft_function' => 'explode2ColumArrays($str, $delimiter = "LINERN")', 'ft_name' => 'Převod do pole'],
            ['ft_id' => '22', 'ft_id_mode' => '5', 'ft_visible' => '1', 'ft_function_name' => 'implode2String', 'ft_function' => 'implode2String($piecesarray, $glue = "LINE")', 'ft_name' => 'Převod pole na řetězec'],
            ['ft_id' => '23', 'ft_id_mode' => '3', 'ft_visible' => '1', 'ft_function_name' => 'sortColumnArrays', 'ft_function' => 'sortColumnArrays($arr)', 'ft_name' => 'Setřídění pole podle abacedy (A-Z)'],
            ['ft_id' => '24', 'ft_id_mode' => '2', 'ft_visible' => '1', 'ft_function_name' => 'rawUrlDecode', 'ft_function' => 'rawUrlDecode($data)', 'ft_name' => 'Dekódovat URL-kódovaný řetězec'],
            ['ft_id' => '25', 'ft_id_mode' => '2', 'ft_visible' => '1', 'ft_function_name' => 'htmlspecialcharsDecode', 'ft_function' => 'htmlspecialcharsDecode($string)', 'ft_name' => 'Převede speciální HTML entity na znaky'],
            ['ft_id' => '60', 'ft_id_mode' => '4', 'ft_visible' => '1', 'ft_function_name' => 'loadSimpleCutArrayMultiple', 'ft_function' => 'loadSimpleCutArrayMultiple($str, $start, $end)', 'ft_name' => 'Rozdělí opakující se řetězce do pole'],
            ['ft_id' => '61', 'ft_id_mode' => '5', 'ft_visible' => '1', 'ft_function_name' => 'setValueFromOtherColumnArray', 'ft_function' => 'setValueFromOtherColumnArray($column_name, $column_id)', 'ft_name' => 'Nastaví obsah z jiné položky typu pole'],
            ['ft_id' => '62', 'ft_id_mode' => '2', 'ft_visible' => '1', 'ft_function_name' => 'fileGetContents', 'ft_function' => 'fileGetContents($string)', 'ft_name' => 'Převede URL na řetězec'],
            ['ft_id' => '63', 'ft_id_mode' => '5', 'ft_visible' => '1', 'ft_function_name' => 'setArrayColum2String', 'ft_function' => 'setArrayColum2String($column_number)', 'ft_name' => 'Vrátí jako řetězec konkrétní obsah pole'],
            ['ft_id' => '64', 'ft_id_mode' => '4', 'ft_visible' => '1', 'ft_function_name' => 'loadSqlFromSync', 'ft_function' => 'loadSqlFromSync($string);', 'ft_name' => 'Načte skoupec z tabulky sync2Items shodující se s $string'],
            ['ft_id' => '65', 'ft_id_mode' => '1', 'ft_visible' => '1', 'ft_function_name' => 'ifIsLinkReturn', 'ft_function' => 'ifIsLinkReturn($str)', 'ft_name' => 'Testuje zda řetězec je link']
        ];

        DB::table('grab_function')->delete();

        foreach ($filter2type as $row) {

            DB::table('grab_function')->insert([
                'id'       => $row['ft_id'],
                'mode_id'  => $row['ft_id_mode'],
                'visible'  => $row['ft_visible'],
                'function' => $row['ft_function_name'],
                'name'     => $row['ft_name'],
            ]);
        }
    }

}