<?php namespace Authority\Eloquent;

class RecordItemsPurchased extends \Eloquent
{
    protected $table = 'record_input_sell';
    protected $guarded = [];

    public $timestamps = true;

    public static $rules = [];

}