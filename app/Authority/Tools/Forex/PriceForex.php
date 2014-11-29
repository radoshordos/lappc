<?php namespace Authority\Tools\Forex;

use Authority\Eloquent\Forex;

class PriceForex
{
    public function __construct()
    {
        $this->table_forex = Forex::all()->toArray();
    }

    public function priceWithCurrencyWith($price, $forex)
    {
        if (isset($price) && isset($forex)) {
            return number_format($price, $this->table_forex[$forex - 1]['round_with'], ',', ' ') . " " . $this->table_forex[$forex - 1]['currency'];
        } else if (isset($price)) {
            return $price;
        }
        return NULL;
    }

    public function priceWithCurrencyWithout($price, $forex)
    {
        if (isset($price) && isset($forex)) {
            return number_format($price, $this->table_forex[$forex - 1]['round_without'], ',', ' ') . " " . $this->table_forex[$forex - 1]['currency'];
        } else if (isset($price)) {
            return $price;
        }
        return NULL;
    }

}