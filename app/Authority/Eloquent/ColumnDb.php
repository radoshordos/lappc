<?php namespace Authority\Eloquent;

class ColumnDb extends \Eloquent
{
    protected $table = 'column_db';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'name' => 'required|unique:column_db,name'
    ];

}