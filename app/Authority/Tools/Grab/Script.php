<?php namespace Authority\Tools\Grab;


class Script
{

    public function concateString($source, $begin, $end)
    {
        return $begin . $source . $end;
    }

    public function ucfirst($string)
    {
        return ucfirst($string);
    }

    public function ucwords($string)
    {
        return ucwords($string);
    }

    public function clearEmptyRows($arr)
    {
        $new = [];
        if (!empty($arr) && is_array($arr)) {
            foreach ($arr as $val) {
                if (!empty($val) && strlen(trim($val)) > 0)
                    $new[] = $val;
            }
        }
        return $new;
    }

    public function loadSimpleCutArrayMultiple($str, $start, $end)
    {

        $arr = [];
        $i = 0;
        if (!empty($str)) {
            do {
                if (intval(stripos($str, $start)) > 0) {

                    $pozStart = strpos($str, $start) + strlen($start);
                    $pozEnd = strpos($str, $end, $pozStart);

                    if ($pozStart < $pozEnd) {
                        $arr[$i++] = trim(substr($str, $pozStart, $pozEnd - $pozStart));
                    }
                    $str = substr($str, $pozEnd + 1);
                } else {
                    break;
                }
            } while (intval($pozStart) > 0 && intval($pozEnd) > 0 && intval($pozStart) < intval($pozEnd));
            return $arr;
        }
        return NULL;
    }

    public function createAliasName($string)
    {

        $chars = [
            '&' => '-', '/' => '-', '"' => '-', '+' => '-', ' ' => '-',
            '=' => '-', '>' => '-', '<' => '-', '\'' => '', '(' => '',
            ')' => '', '?' => '', 'ø' => '', '#' => '', ':' => '',
            ',' => '', '§' => '', '.' => '', '“' => '', '×' => '', '`' => '', "--" => "-"
        ];

        $str1 = mb_convert_case(self::csUtf2Ascii($string), MB_CASE_LOWER, "ASCII");
        $str2 = str_replace(['--'], "-", str_replace(array_keys($chars), array_values($chars), trim(strtolower(strip_tags($str1)))));
        return str_replace(['--'], "-", $str2);
    }

    public function explode2ColumnArrays($str, $delimiter = "LINERN")
    {

        $chars = ['&#13;' => "\n", '&#10;' => "\r"];
        $str = str_replace(array_keys($chars), array_values($chars), $str);
        if (empty($delimiter) || $delimiter == 'LINE' || strtoupper($delimiter) == 'LINEN') {
            $delimiter = "\n";
        } else if (strtoupper($delimiter) == 'LINER') {
            $delimiter = "\r";
        } else if (strtoupper($delimiter) == 'LINERN') {
            $delimiter = "\r\n";
        } else if (strtoupper($delimiter) == 'LINERNRN') {
            $delimiter = "\r\n\r\n";
        }

        return explode($delimiter, $str);
    }

    public function fileGetContents($string)
    {
        $opts = ['http' => ['header' => "User-Agent:MyAgent/1.0\r\n"]];
        $context = stream_context_create($opts);
        return file_get_contents($string, false, $context);
    }

    public function stripClRf($string)
    {
        return str_replace(["\0x0d\0x0a", "\0x0d", "\0x0a"], '', $string);
    }

    public function filterSanitizeSpecialCharts($string)
    {
        $string1 = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
        $string2 = $this->stripClRf(str_replace(["&#9;", "&#13;", "  ", "&#38;nbsp;"], "", $string1));
        return $string = strtr($string2, ["&#10;" => "\n", "&#38;" => "&"]);
    }

    public function htmlspecialcharsDecode($string)
    {
        return htmlspecialchars_decode($string);
    }

    public function ifStrlenIsBigerReturn($string, $int, $str)
    {
        if (strlen($string) > intval($int)) {
            return $str;
        }
        return $string;
    }

    public function implode2String($piecesarray, $glue = "LINE")
    {

        if (strtoupper($glue) == 'LINE' || strtoupper($glue) == 'LINER') {
            $glue = "\r";
        } elseif (strtoupper($glue) == 'LINERN') {
            $glue = "\r\n";
        } elseif (strtoupper($glue) == 'LINEN') {
            $glue = "\n";
        } elseif (strtoupper($glue) == 'NO') {
            $glue = "";
        }

        $result = implode($glue, $piecesarray);
        return strtr($result, [chr(10) . chr(32) => chr(10), chr(13) . chr(32) => chr(13)]);
    }

    public function loadSimpleCutString($str, $start, $end)
    {

        if (!empty($str)) {

            $pozStart = strpos($str, $start) + strlen($start);
            $pozEnd = strpos($str, $end, $pozStart);

            if (empty($end)) {
                return trim(substr($str, $pozStart));
            } elseif ($pozStart > 0 && $pozEnd > 0 && $pozStart < $pozEnd) {
                return trim(substr($str, $pozStart, $pozEnd - $pozStart));
            }
        }
    }

    public function loadSqlFromSync($arr)
    {
        /*
        $db = Model_Zendb::myfactory();
        $db->setFetchMode(Zend_Db::FETCH_ASSOC);
        return $db->fetchRow($db->select()->from("sync2items")->where("si_items_code_product = ?", $arr));
        */
    }

    public function rawUrlDecode($str)
    {
        if (!empty($str)) {
            return rawurldecode($str);
        }
    }

    public function togeterTwoColumn($array, $glue)
    {
        $final = [];
        if (count($array) % 2 == 0) {
            $double = [];
            foreach ($array as $k => $v) {
                if ($k % 2 == 0) {
                    $double[0] = $v;
                } else {
                    $double[1] = $v;
                    $final[] = implode($glue, $double);
                }
            }
        }
        return $final;
    }

    public function setArrayColum2String($arr, $column_number)
    {
        if (!empty($arr[$column_number])) {
            return $arr[$column_number];
        }
    }

    public function trim($str)
    {
        return trim($str);
    }

    public function strToLower($str)
    {
        return strtolower($str);
    }

    public function strToUpper($str)
    {
        return strtolower($str);
    }

    public function sortColumnArrays($arr)
    {
        return asort($arr);
    }

    public function setValueToColumn($val1)
    {
        return $val1;
    }

    public function stripTags($str)
    {
        return strip_tags($str);
    }

    public function clearMultiSpace($mixed)
    {

        for ($i = 0; $i < strlen($mixed); $i++) {
            $newstr = $newstr . substr($mixed, $i, 1);
            if (substr($mixed, $i, 1) == ' ') {
                while (substr($mixed, $i + 1, 1) == ' ') {
                    $i++;
                }
            }
        }

        return $newstr;
    }

    public function strReplace($string, $from, $to)
    {
        if ($to == "LINE") {
            $to = "\n";
        } elseif ($to == "LINERN") {
            $to = "\r\n";
        }

        if ($from == "LINE") {
            $from = "\n";
        } elseif ($from == "LINERN") {
            $from = "\r\n";
        }


        return str_replace($from, $to, $string);
    }

    public function setValueFromOtherColumnArray($col_name, $col_id)
    {
        if (isset($col_name["$col_id"])) {
            return $col_name["$col_id"];
        }
    }

    public function csUtf2Ascii($string)
    {
        return strtr($string, ["\xc3\xa1" => "a", "\xc3\xa4" => "a", "\xc4\x8d" => "c", "\xc4\x8f" => "d", "\xc3\xa9" => "e", "\xc4\x9b" => "e", "\xc3\xad" => "i", "\xc4\xbe" => "l", "\xc4\xba" => "l", "\xc5\x88" => "n", "\xc3\xb3" => "o", "\xc3\xb6" => "o", "\xc5\x91" => "o", "\xc3\xb4" => "o", "\xc5\x99" => "r", "\xc5\x95" => "r", "\xc5\xa1" => "s", "\xc5\xa5" => "t", "\xc3\xba" => "u", "\xc5\xaf" => "u", "\xc3\xbc" => "u", "\xc5\xb1" => "u", "\xc3\xbd" => "y", "\xc5\xbe" => "z", "\xc3\x81" => "A", "\xc3\x84" => "A", "\xc4\x8c" => "C", "\xc4\x8e" => "D", "\xc3\x89" => "E", "\xc4\x9a" => "E", "\xc3\x8d" => "I", "\xc4\xbd" => "L", "\xc4\xb9" => "L", "\xc5\x87" => "N", "\xc3\x93" => "O", "\xc3\x96" => "O", "\xc5\x90" => "O", "\xc3\x94" => "O", "\xc5\x98" => "R", "\xc5\x94" => "R", "\xc5\xa0" => "S", "\xc5\xa4" => "T", "\xc3\x9a" => "U", "\xc5\xae" => "U", "\xc3\x9c" => "U", "\xc5\xb0" => "U", "\xc3\x9d" => "Y", "\xc5\xbd" => "Z"]);
    }

}