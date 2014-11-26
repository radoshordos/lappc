<?php namespace Authority\Eloquent;

class ProdDescription extends \Eloquent
{
    protected $table = 'prod_description';
    protected $guarded = [];

    public $timestamps = FALSE;

    public static $rules = [
        'prod_id'       => 'required|exists:prod,id',
        'variations_id' => 'required|exists:media_variations,id',
    ];


    public function mediaVariations()
    {
        return $this->hasOne('Authority\Eloquent\MediaVariations', 'id', 'variations_id');
    }
}