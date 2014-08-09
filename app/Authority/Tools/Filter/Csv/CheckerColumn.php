<?php namespace Authority\Tools\Filter\Csv;

class CheckerColumn extends CsvAbstract
{

    public function __construct($item, $line)
    {
        try {
            $this->checkOnePriceValue($item, $line);
            return TRUE;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function checkOnePriceValue($item, $line)
    {
        $counter = 0;

        if (isset($item['price_standart']) && is_numeric($item['price_standart']) && intval($item['price_standart']) > 0) {
            $counter++;
        }
        if (isset($item['price_action']) && is_numeric($item['price_action']) && intval($item['price_action']) > 0) {
            $counter++;
        }
        if (isset($item['price_internet']) && is_numeric($item['price_internet']) && intval($item['price_internet']) > 0) {
            $counter++;
        }

        if ($counter > 1) {
            throw new \Exception("[LINE: " . $line . "]  Je možné zadat jen jednu hodnotu ceny. <pre>[" . implode(';',$item) . "]</pre>");
        } elseif ($counter == 0) {
            throw new \Exception("[LINE: " . $line . "]  Nebyla zadaná správná cena položky. <pre>[" . implode(';',$item) . "]</pre>");
        } else {
            return TRUE;
        }
    }
}