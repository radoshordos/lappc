<?php

namespace Authority\Eloquent;

class FeedServiceM2nColumn extends \Eloquent
{
    protected $table = 'feed_service_m2n_column';
    protected $guarded = [];
    public $timestamps = false;

    public static $rules = array();

    public function scopeServiceId($query, $int)
    {
        if (intval($int) > 0) {
            return $query->where('service_id', '=', $int);
        }
    }

    public function feedColumn()
    {
        return $this->hasOne('Authority\Eloquent\FeedColumn','id','column_id');
    }

}