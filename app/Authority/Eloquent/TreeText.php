<?php namespace Authority\Eloquent;

class TreeText extends \Eloquent
{
    protected $table = 'tree_text';
    protected $guarded = [];
    public $timestamps = FALSE;

    public static $rules = [
        'tree_id' => 'required|exists:tree,id',
        'text'    => 'required|min:1|max:12000'
    ];

    public function tree()
    {
        return $this->hasOne('Authority\Eloquent\Tree', 'id', 'tree_id');
    }

}