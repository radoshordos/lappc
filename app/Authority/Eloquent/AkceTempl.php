<?php

namespace Authority\Eloquent;

class AkceTempl extends \Eloquent
{
    protected $table = 'akce_template';

    public function mixtureDev()
    {
        return $this->hasOne('Authority\Eloquent\MixtureDev', 'id', 'mixture_dev_id');
    }

    public function akceMinitext()
    {
        return $this->hasOne('Authority\Eloquent\AkceMinitext', 'id', 'minitext_id');
    }
}