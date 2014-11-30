<?php namespace Authority\Eloquent;

class AkceTempl extends \Eloquent
{
    protected $table = 'akce_template';
    protected $guarded = [];

    public static $rules = [
        'mixture_dev_id'  => 'required|exists:mixture_dev,id',
        'availibility_id' => 'required|exists:akce_availability,id',
        'minitext_id'     => 'required|exists:akce_minitext,id',
        'mixture_item_id' => 'exists:mixture_item,id',
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

    public function mixtureItem()
    {
        return $this->hasOne('Authority\Eloquent\MixtureItem', 'id', 'mixture_item_id');
    }
}