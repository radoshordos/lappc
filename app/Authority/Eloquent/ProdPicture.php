<?php namespace Authority\Eloquent;

class ProdPicture extends \Eloquent
{
    protected $table = 'prod_picture';
    protected $guarded = [];

    public $timestamps = false;

    public static $rules = [
        'prod_id'    => 'required|exists:prod,id',
        'img_big'    => 'required|min:4|max:160',
        'img_normal' => 'required|min:4|max:160',
    ];

}