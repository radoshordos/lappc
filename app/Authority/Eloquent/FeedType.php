<?php

namespace Authority\Eloquent;

class FeedType extends \Eloquent
{
    protected $table = 'feed_type';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'code' => 'required'
    );

}