<?php namespace Authority\Eloquent;

class GrabDb extends \Eloquent
{
    protected $table = 'grab_db';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'profile_id'  => 'required|exists:grab_profile,id',
        'column_id'   => 'required|exists:column_db,id',
        'function_id' => 'required|exists:grab_function,id',
    ];

    public function grabFunction()
    {
        return $this->hasOne('Authority\Eloquent\GrabFunction', 'id', 'function_id');
    }

    public function columnDb()
    {
        return $this->hasOne('Authority\Eloquent\ColumnDb', 'id', 'column_id');
    }

    public function grabProfile()
    {
        return $this->hasOne('Authority\Eloquent\GrabProfile', 'id', 'profile_id');
    }
}