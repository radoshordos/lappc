<?php

namespace Authority\Eloquent;

class AkceTempl extends \Eloquent
{
    protected $table = 'akce_template';
    protected $guarded = [];

    public function akceMinitext()
    {
        return $this->hasOne('Authority\Eloquent\AkceMinitext', 'id', 'minitext_id');
    }

    public function akceAvailability()
    {
        return $this->hasOne('Authority\Eloquent\AkceAvailability', 'id', 'availibility_id');
    }

    public function mixtureDev()
    {
        return $this->hasOne('Authority\Eloquent\MixtureDev', 'id', 'mixture_dev_id');
    }

}