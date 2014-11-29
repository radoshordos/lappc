<?php namespace Authority\Tools\Forex;

use Authority\Eloquent\Forex;
use Illuminate\Support\ServiceProvider;

class PriceProvider extends ServiceProvider
{

    private $table_forex;

    public function __construct()
    {
        $this->table_forex = Forex::all()->toArray();
    }

    public function priceWithCurrencyWith($price, $forex)
    {
        return number_format($price, $this->table_forex[$forex - 1]['round_with'], ',', ' ') . " " . $this->table_forex[$forex - 1]['currency'];
    }

    public function priceWithCurrencyWithout($price, $forex)
    {
        return number_format($price, $this->table_forex[$forex - 1]['round_without'], ',', ' ') . " " . $this->table_forex[$forex - 1]['currency'];
    }

    public function register()
    {
        $this->app->singleton('price', function () {
            return new PriceProvider;
        });

    }
}