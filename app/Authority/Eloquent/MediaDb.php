<?php namespace Authority\Eloquent;

class MediaDb extends \Eloquent
{
    protected $table = 'media_db';
    protected $guarded = [];
    public $timestamps = true;

    public static $rules = [];

    public function mediaVariations()
    {
        return $this->hasOne('Authority\Eloquent\MediaVariations', 'id', 'variations_id');
    }
}