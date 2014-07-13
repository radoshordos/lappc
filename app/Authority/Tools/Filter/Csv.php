<?php

namespace Authority\Tools\Filter;

class Csv
{

    private $data_input = NULL;
    private $data_output = array();
    private $data_bug = array();

    public function __construct($data_input)
    {
        $this->data_input = $data_input;
    }

    public function getDataBug()
    {
        if (count($this->data_bug) > 0) {
            return implode(self::ENDOFLINE, $this->data_bug);
        } else {
            return NULL;
        }
    }

    public function getDataOutput()
    {

        if (count($this->data_output) > 0) {
            return implode(self::ENDOFLINE, $this->data_output);
        } else {
            return NULL;
        }
    }

    public function reduceUnusableCharts()
    {
        $i = 0;

        $reduce = array(
            " ;" => ";", "; " => ";", "  " => " ", ";;" => ";", "&" => "a", "''" => "", ";\r" => "\r", " ? " => "", "×" => "x",
            ",-" => "", "\"" => "", "*" => "", '“' => "", "®" => "", "™" => "", "°" => "", ",-" => "", '”' => "", '´' => "");

        foreach (explode(self::ENDOFLINE, $this->data_input) as $val) {
            $this->data_output[$i++] = strtr($val, $reduce);
        }
    }
}