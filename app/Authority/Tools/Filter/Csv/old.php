<?php

class Tools_Model_CsvBugDetector
{

    const DELIMITER = ";";
    const ENDOFLINE = "\r\n";

    public function getPossibilityArray()
    {

        return array(
            "1" => "1] CLEAR BAD CHOOSE COUNT COLUMNS | Odstraní položky {comumn} se špatným počtem oddělovačů v řádce",
            "2" => "2] CLEAR START DELIMITER | Odstraní položky začínající oddělovačem",
            "3" => "3] CLEAR NO INT+ CHOOSE COLUMN | Odstraní položky neobsahující {comumn} INT+",
            "4" => "4] CLEAR DOUBLE DELIMITER | Odstraní radky s 2 oddělovači u sebe",
            "5" => "5] ARRAY UNIQUE AND SORT | Odstraní duplicitní řádky a setřídí položky",
            "6" => "6] REDUCE UNUSABLE CHARS | Odstraní prebytečné znaky",
            "7" => "7] REDUCE SPACE INTO STRING | Odstraní mezery z řetězce zvleného políčka",
            "8" => "8] CONVERSION & 2 &amp; | Konverze aka HtmlSpecialChatrs",
            "9" => "9] ADD CHARS {comumn} TO SIZE {size} AND VALUE {string} | Doplní sloupec pevnou delkou řetězem na zvoleného řetězce"
        );
    }

    private $inputData = NULL;
    private $outputData = array();
    private $bugData = array();

    public function setInputData($inputData)
    {
        $this->inputData = $inputData;
    }

    public function getInputData()
    {
        return $this->inputData;
    }

    public function getExtStrPad($column, $number, $string)
    {
        $i = 0;
        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $arr = array();
            $i++;
            $j = 0;
            foreach (explode(self::DELIMITER, $val) as $val2) {
                $j++;
                if ($j == $column) {
                    $arr[$j] = str_pad($val2, intval($number), $string, STR_PAD_LEFT);
                } else {
                    $arr[$j] = $val2;
                }
            }
            $this->outputData[$i] = implode(self::DELIMITER, $arr);
        }
    }

    public function getOutputData()
    {
        if (count($this->outputData) > 0) {
            return implode(self::ENDOFLINE, $this->outputData);
        } else {
            return NULL;
        }
    }

    public function getBugData()
    {
        if (count($this->bugData) > 0) {
            return implode(self::ENDOFLINE, $this->bugData);
        } else {
            return NULL;
        }
    }

    public function findSuccesCountColumns($column)
    {
        $i = 0;
        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $i++;
            if (count(explode(self::DELIMITER, $val)) == $column) {
                $this->outputData[$i] = $val;
            } else {
                $this->bugData[$i] = $val;
            }
        }
    }

    public function clearDoubleDeterminer()
    {
        $i = 0;
        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $i++;
            if (strpos($val, self::DELIMITER . self::DELIMITER) == TRUE) {
                $this->bugData[$i] = $val;
            } else {
                $this->outputData[$i] = $val;
            }
        }
    }

    public function clearStartDelimiter()
    {
        $i = 0;
        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $i++;
            if ($val[0] != self::DELIMITER) {
                $this->outputData[$i] = $val;
            } else {
                $this->bugData[$i] = $val;
            }
        }
    }

    public function clearNoIntChoiseColumn($column)
    {
        $i = 0;
        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $i++;
            $j = 0;
            foreach (explode(self::DELIMITER, $val) as $val2) {
                $j++;
                if ($j == $column) {
                    if (intval($val2) > 0) {
                        $this->outputData[$i] = $val;
                    } else {
                        $this->bugData[$i] = $val;
                    }
                }
            }
        }
    }

    public function arrayUniqueAndSort()
    {
        $i = 0;
        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $i++;
            $this->outputData[$i] = $val;
        }
        sort($this->outputData);

        for ($j = 1; $j < count($this->outputData); $j++) {
            if ((crc32($this->outputData[$j - 1])) == (crc32($this->outputData[$j])))
                $this->bugData[$j] = $this->outputData[$j];
        }
        $this->outputData = array_unique($this->outputData, 3);
    }

    public function reduceUnusableCharts()
    {
        $i = 0;

        $reduce = array(
            "  " => " ",
            "'" => "",
            "?" => "",
            "×" => "x",
            ",-" => "",
            "\"" => "",
            "*" => "",
            '“' => "",
            "®" => "",
            "™" => "",
            "°" => "",
            '´' => "");

        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $i++;
            $this->outputData[$i] = strtr($val, $reduce);
        }
    }

    public function repairAkaHtmlSpecialChars()
    {
        $i = 0;
        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $i++;
            $this->outputData[$i] = htmlspecialchars(htmlspecialchars($val));
        }
    }

    public function reduceSpaceIntoString()
    {
        $i = 0;
        foreach (explode(self::ENDOFLINE, $this->inputData) as $val) {
            $i++;
            $j = 0;
            $tmp = array();
            foreach (explode(self::DELIMITER, $val) as $val2) {
                $j++;
                if ($j == intval($_POST["count_column"])) {
                    $tmp[$j] = strtr($val2, array(" " => ""));
                } else {
                    $tmp[$j] = $val2;
                }
                $this->outputData[$i] = implode($tmp, self::DELIMITER);
            }
        }
    }
}
