<?php

namespace Authority\Tools\Filter\Csv;

class CheckerGlobal extends CsvAbstract
{
    protected $data_input;
    protected $count_column;

    public function __construct($eloq, $data_input)
    {
        $this->count_column = $eloq->trigger_column_count;
        $this->data_input = trim($data_input);
    }

    public function checkColumnQuantity($endofline, $separator)
    {
        $i = 0;
        foreach (explode($endofline, $this->data_input) as $val) {
            $i++;
            if (substr_count($val, $separator) != $this->count_column - 1) {
                throw new \Exception("[LINE: " . $i . "]  Špatný počet sloupců: '" . $val . "'");
            }
        }
        return TRUE;
    }

}