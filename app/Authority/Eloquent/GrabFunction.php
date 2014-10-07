<?php namespace Authority\Eloquent;

class GrabFunction extends \Eloquent
{

    protected $table = 'grab_function';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'function' => 'required'
    ];

    public function grabMode()
    {
        return $this->hasOne('Authority\Eloquent\GrabMode', 'id', 'mode_id');
    }

}