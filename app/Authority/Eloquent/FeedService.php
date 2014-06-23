<?php

namespace Authority\Eloquent;

class FeedService extends \Eloquent
{
    protected $table = 'feed_service';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array(
        'filename' => 'exists:feed_db,filename',
    );

    public function feedType()
    {
        return $this->hasOne('Authority\Eloquent\FeedType', 'id', 'type_id');
    }

}