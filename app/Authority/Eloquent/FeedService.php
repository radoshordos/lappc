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

    public function scopeFilename($query, $string)
    {
        if (count($string) > 0) {
            return $query->where('filename', '=', $string);
        }
    }

    public function column()
    {
        return $this->belongsToMany('Authority\Eloquent\FeedColumn', 'feed_column', 'customer_id', 'drink_id')->withPivot('feed_service_m2n_column','value');
    }


    public function feedServiceM2nColumn()
    {
        return $this->hasMany('Authority\Eloquent\FeedServiceM2nColumn','service_id', 'id');
    }

    public function feedType()
    {
        return $this->hasOne('Authority\Eloquent\FeedType', 'id', 'type_id');
    }

}