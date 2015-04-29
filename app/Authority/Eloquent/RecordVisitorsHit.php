<?php namespace Authority\Eloquent;

class RecordVisitorsHit extends \Eloquent
{
    public static $rules = [];
    public $timestamps = FALSE;
    protected $table = 'record_visitors_hit';
    protected $guarded = [];
}