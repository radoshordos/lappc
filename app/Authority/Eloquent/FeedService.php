<?php

namespace Authority\Eloquent;

class FeedService extends \Eloquent
{
    protected $table = 'feed_service';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'filename' => 'exists:feed_service,filename',
    );

    public function feedServiceM2nColumn()
    {
        return $this->hasMany('Authority\Eloquent\FeedServiceM2nColumn','service_id', 'id');
    }


    public function feedType()
    {
        return $this->hasOne('Authority\Eloquent\FeedType', 'id', 'type_id');
    }

}