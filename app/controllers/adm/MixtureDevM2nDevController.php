<?php

use Authority\Eloquent\MixtureDevM2nDev;

class MixtureDevM2nDevController extends \BaseController
{
    protected $mixture_dev_m2n_dev;

    function __construct(MixtureDevM2nDev $mixture_dev_m2n_dev)
    {
        $this->mixture_dev_m2n_dev = $mixture_dev_m2n_dev;
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureDevM2nDev::$rules);

        if ($v->passes()) {
            $this->mixture_dev_m2n_dev->create($input);
            return Redirect::route('adm.pattern.mixturedev.edit', $input['mixture_dev_id']);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturedev.edit', $input['mixture_dev_id'])->withInput()->withErrors($v);
        }
    }

    public function destroy($id)
    {
        $idx = explode('x', $id);
        $row = MixtureDevM2nDev::where('mixture_dev_id', '=', intval($idx[0]))->where('dev_id', '=', intval($idx[1]))->firstOrFail();

        if ($row) {
            $this->mixture_dev_m2n_dev->find($row->id)->delete();
        }
        return Redirect::route('adm.pattern.mixturedev.edit', $idx[0]);
    }

}