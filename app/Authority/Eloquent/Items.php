<?php namespace Authority\Eloquent;

class Items extends \Eloquent
{

    protected $table = 'items';
    protected $guarded = [];

    public function itemsAvailability()
    {
        return $this->hasOne('Authority\Eloquent\ItemsAvailability', 'id', 'availability_id');
    }

    public function prod()
    {
        return $this->hasOne('Authority\Eloquent\Prod', 'id', 'prod_id');
    }

}