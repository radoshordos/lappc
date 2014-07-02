<?php

use Authority\Eloquent\SyncTemplateM2nColmun;

class SyncTemplateM2nColumnController
{
    protected $m2n;

    function __construct(SyncTemplateM2nColmun $m2n)
    {
        $this->m2n = $m2n;
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, SyncTemplateM2nColmun::$rules);

        if ($v->passes()) {
            $this->m2n->create($input);
            return Redirect::route('adm.sync.template.edit', $input['template_id']);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.sync.template.edit', $input['template_id'])->withInput()->withErrors($v);
        }
    }

}