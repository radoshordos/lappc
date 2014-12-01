<?php namespace Authority\Eloquent;

class RecordItemsPurchased extends \Eloquent
{
    protected $table = 'record_items_purchased';
    protected $guarded = [];

    public $timestamps = true;

    public static $rules = [];

}