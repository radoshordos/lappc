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

    public function feedService()
    {
        return $this->belongsToMany('Authority\Eloquent\FeedService', 'feed_service_m2n_column', 'column_id', 'service_id')->withPivot('value');
    }

}