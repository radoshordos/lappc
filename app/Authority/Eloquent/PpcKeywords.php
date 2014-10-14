<?php namespace Authority\Eloquent;

class PpcKeywords extends \Eloquent
{
    protected $table = 'ppc_keywords';

    protected $fillable = ['sklik_id', 'match_id', 'name', 'cpc'];
    protected $guarded = [];

    public static $rules = [
        'name'     => 'required',
        'cpc'      => 'required',
        'match_id' => 'exists:ppc_keywords_match,id'
    ];

    public function ppcKeywordsMatch()
    {
        return $this->hasOne('Authority\Eloquent\PpcKeywordsMatch', 'id', 'match_id');
    }
}