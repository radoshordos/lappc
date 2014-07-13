<?php

namespace Authority\Tools\Filter;

class CsvChecker extends CsvAbstract
{
    public function __construct($data_input)
    {
        $this->data_input = trim($data_input);
    }

    public function checkColumnQuantity($count_column, $endofline, $separator)
    {
        $i = 0;
        foreach (explode($endofline, $this->data_input) as $val) {
            $i++;
            if (substr_count($val, $separator) != $count_column - 1) {
                throw new \Exception("[LINE: " . $i . "]  Špatný počet sloupců: '" . $val . "'");
            }
        }
        return TRUE;
    }

}