<?php namespace Authority\Eloquent;

class AkceTempl extends \Eloquent
{
    protected $table = 'akce_template';
    protected $guarded = [];

    public static $rules = [
        'mixture_dev_id'  => 'exists:mixture_dev,id',
        'availibility_id' => 'exists:ppc_keywords_match,id',
        'minitext_id'     => 'exists:akce_minitext,id',
        'endtime'         => ['required', 'date_format:"Y-m-d"']
    ];

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