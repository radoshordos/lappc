<?php namespace Authority\Tools\Filter\Csv;

class CheckerGlobal extends CsvAbstract
{
    protected $separator;
    protected $line_end;
    protected $data_output;
    protected $count_column;

    protected $reduce = array(
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
        '´' => ""
    );

    public function __construct($elo, $data_input, $separator, $line_end)
    {
        $this->separator = $separator;
        $this->line_end = $line_end;
        $this->count_column = $elo->trigger_column_count;
        $this->data_output = strtr(trim($data_input), $this->reduce);
    }

    public function checkColumnQuantity()
    {
        $i = 0;
        foreach (explode($this->line_end, $this->data_output) as $val) {
            $i++;
            if (substr_count($val, $this->separator) != $this->count_column - 1) {
                throw new \Exception("[LINE: " . $i . "]  Špatný počet sloupců: <pre>" . $val . "</pre>");
            }
        }
        return TRUE;
    }

    public function getDataOutput()
    {
        return $this->data_output;
    }
}