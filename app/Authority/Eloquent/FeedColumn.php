<?php

namespace Authority\Eloquent;

class FeedColumn extends \Eloquent
{
    protected $table = 'feed_column';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'id' => 'required',
        'name' => 'required'
    );

}