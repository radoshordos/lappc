<?php

use Authority\Eloquent\MixtureDevM2nDev;

class MixtureDevM2nDevController extends \BaseController
{
    protected $mdmd;

    function __construct(MixtureDevM2nDev $mdmd)
    {
        $this->mdmd = $mdmd;
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureDevM2nDev::$rules);

        if ($v->passes()) {
            try {
                $this->mdmd->create($input);
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
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
            $this->mdmd->find($row->id)->delete();
        }
        return Redirect::route('adm.pattern.mixturedev.edit', $idx[0]);
    }

}