<?php namespace Authority\Tools\Filter\Csv;

class CheckerColumn extends CsvAbstract
{

    protected $line;

    public function __construct($item, $line)
    {
        $this->item = $item;

        try {
            $this->fixPriceRange($line);
            $this->checkOnePriceValue($line);
            return TRUE;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getItem()
    {
        return $this->item;
    }

    public function fixPriceRange($line)
    {
        if (isset($this->item['price_standard']) && strlen($this->item['price_standard']) > 0) {
            $this->item['price_standard'] = str_replace(" ", "", $this->item['price_standard']);
        }
        if (isset($this->item['price_action']) && strlen($this->item['price_action']) > 0) {
            $this->item['price_action'] = str_replace(" ", "", $this->item['price_action']);
        }
        if (isset($this->item['price_internet']) && strlen($this->item['price_internet']) > 0) {
            $this->item['price_internet'] = str_replace(" ", "", $this->item['price_internet']);
        }
    }


    public function checkOnePriceValue($line)
    {
        $counter = 0;

        if (isset($this->item['price_standard']) && is_numeric($this->item['price_standard']) && intval($this->item['price_standard']) > 0) {
            $counter++;
        }
        if (isset($this->item['price_action']) && is_numeric($this->item['price_action']) && intval($this->item['price_action']) > 0) {
            $counter++;
        }
        if (isset($this->item['price_internet']) && is_numeric($this->item['price_internet']) && intval($this->item['price_internet']) > 0) {
            $counter++;
        }

        if ($counter > 1) {
            throw new \Exception("[LINE: " . $line . "]  Je možné zadat jen jednu hodnotu ceny. <pre>[" . implode(';', $this->item) . "]</pre>");
        } elseif ($counter == 0) {
            throw new \Exception("[LINE: " . $line . "]  Nebyla zadaná správná cena položky. <pre>[" . implode(';', $this->item) . "]</pre>");
        } else {
            return TRUE;
        }
    }
}