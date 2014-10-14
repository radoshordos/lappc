<?php namespace Authority\Tools\Grab;

class Script
{
    private $source;
    private $name;
    private $val1;
    private $val2;

    public function setParameters($source, $name, $val1, $val2)
    {
        $this->source = $source;
        $this->name = $name;
        $this->val1 = $val1;
        $this->val2 = $val2;
    }

    public function applyScript()
    {
        $method = $this->name;
        return $this->$method();
    }

    public function concateString()
    {
        return $this->val1 . $this->source . $this->val2;
    }

    public function ucfirst()
    {
        return ucfirst($this->source);
    }

    public function ucwords()
    {
        return ucwords($this->source);
    }

    public function clearEmptyRows()
    {
        $arr = [];
        if (!empty($this->source) && is_array($this->source)) {
            foreach ($this->source as $val) {
                if (!empty($val) && strlen(trim($val)) > 0)
                    $arr[] = $val;
            }
        }
        return $arr;
    }

    public function loadSimpleCutArrayMultiple()
    {
        /*
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
        */
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

    public function explode2ColumnArrays()
    {
        $chars = ['&#13;' => "\n", '&#10;' => "\r"];
        $str = str_replace(array_keys($chars), array_values($chars), $this->source);
        if (empty($this->val1) || $this->val1 == 'LINE' || strtoupper($this->val1) == 'LINEN') {
            $this->val1 = "\n";
        } else if (strtoupper($this->val1) == 'LINER') {
            $this->val1 = "\r";
        } else if (strtoupper($this->val1) == 'LINERN') {
            $this->val1 = "\r\n";
        } else if (strtoupper($this->val1) == 'LINERNRN') {
            $this->val1 = "\r\n\r\n";
        }
        return explode($this->val1, $str);
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

    public function filterSanitizeSpecialCharts()
    {
        $string1 = filter_var($this->source, FILTER_SANITIZE_SPECIAL_CHARS);
        $string2 = $this->stripClRf(str_replace(["&#9;", "&#13;", "  ", "&#38;nbsp;"], "", $string1));
        return strtr($string2, ["&#10;" => "\n", "&#38;" => "&"]);
    }

    public function htmlspecialcharsDecode()
    {
        return htmlspecialchars_decode($this->source);
    }

    public function ifStrlenIsBigerReturn()
    {
        if (strlen($this->source) > intval($this->val1)) {
            return $this->val2;
        }
        return $this->source;
    }

    public function implode2String()
    {
        if (is_array($this->source)) {
            if (strtoupper($this->val1) == 'LINE' || strtoupper($this->val1) == 'LINER') {
                $glue = "\r";
            } elseif (strtoupper($this->val1) == 'LINERN') {
                $glue = "\r\n";
            } elseif (strtoupper($this->val1) == 'LINEN') {
                $glue = "\n";
            } elseif (strtoupper($this->val1) == 'NO') {
                $glue = "";
            } else {
                $glue = $this->val1;
            }

            $data = implode($glue, $this->source);
            return strtr($data, [chr(10) . chr(32) => chr(10), chr(13) . chr(32) => chr(13)]);
        }
    }

    public function loadSimpleCutString()
    {
        if (!empty($this->source)) {

            $start = strpos($this->source, $this->val1) + strlen($this->val1);
            $end = strpos($this->source, $this->val2, $start);

            if (empty($this->val2)) {
                return trim(substr($this->source, $start));
            } elseif ($start > 0 && $end > 0 && $start < $end) {
                return trim(substr($this->source, $start, $end - $start));
            }
        }
    }

    public function loadSqlFromSync()
    {
        /*
        $db = Model_Zendb::myfactory();
        $db->setFetchMode(Zend_Db::FETCH_ASSOC);
        return $db->fetchRow($db->select()->from("sync2items")->where("si_items_code_product = ?", $arr));
        */
        return "HOVNO";
    }

    public function rawUrlDecode($str)
    {
        if (!empty($str)) {
            return rawurldecode($str);
        }
    }

    public function togeterTwoColumn()
    {
        $final = [];
        if (count($this->source) % 2 == 0) {
            $double = [];
            foreach ($this->source as $k => $v) {
                if ($k % 2 == 0) {
                    $double[0] = $v;
                } else {
                    $double[1] = $v;
                    $final[] = implode($this->val1, $double);
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

    public function setValueToColumn()
    {
        return $this->val1;
    }

    public function stripTags()
    {
        return strip_tags($this->source);
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

    public function strReplace()
    {
        if ($this->val2 == "LINE") {
            $this->val2 = "\n";
        } elseif ($this->val2 == "LINERN") {
            $this->val2 = "\r\n";
        }

        if ($this->val1 == "LINE") {
            $this->val1 = "\n";
        } elseif ($this->val1 == "LINERN") {
            $this->val1 = "\r\n";
        }

        return str_replace($this->val1, $this->val2, $this->source);
    }

    public function setValueFromOtherColumnArray()
    {
        if (isset($this->val1[$this->val2])) {
            return $this->val1[$this->val2];
        }
    }

    public function csUtf2Ascii($string)
    {
        return strtr($string, ["\xc3\xa1" => "a", "\xc3\xa4" => "a", "\xc4\x8d" => "c", "\xc4\x8f" => "d", "\xc3\xa9" => "e", "\xc4\x9b" => "e", "\xc3\xad" => "i", "\xc4\xbe" => "l", "\xc4\xba" => "l", "\xc5\x88" => "n", "\xc3\xb3" => "o", "\xc3\xb6" => "o", "\xc5\x91" => "o", "\xc3\xb4" => "o", "\xc5\x99" => "r", "\xc5\x95" => "r", "\xc5\xa1" => "s", "\xc5\xa5" => "t", "\xc3\xba" => "u", "\xc5\xaf" => "u", "\xc3\xbc" => "u", "\xc5\xb1" => "u", "\xc3\xbd" => "y", "\xc5\xbe" => "z", "\xc3\x81" => "A", "\xc3\x84" => "A", "\xc4\x8c" => "C", "\xc4\x8e" => "D", "\xc3\x89" => "E", "\xc4\x9a" => "E", "\xc3\x8d" => "I", "\xc4\xbd" => "L", "\xc4\xb9" => "L", "\xc5\x87" => "N", "\xc3\x93" => "O", "\xc3\x96" => "O", "\xc5\x90" => "O", "\xc3\x94" => "O", "\xc5\x98" => "R", "\xc5\x94" => "R", "\xc5\xa0" => "S", "\xc5\xa4" => "T", "\xc3\x9a" => "U", "\xc5\xae" => "U", "\xc3\x9c" => "U", "\xc5\xb0" => "U", "\xc3\x9d" => "Y", "\xc5\xbd" => "Z"]);
    }

}