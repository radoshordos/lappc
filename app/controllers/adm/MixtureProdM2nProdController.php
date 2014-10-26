<?php

use Authority\Eloquent\Mixture;

class MixtureProdM2nProdController extends \BaseController
{
    protected $mpmp;

    function __construct(MixtureProdM2nProd $mpmp)
    {
        $this->mpmp = $mpmp;
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureProdM2nProd::$rules);

        if ($v->passes()) {
            try {
                $this->mpmp->create($input);
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.pattern.mixtureprod.edit', $input['mixture_prod_id']);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixtureprod.edit', $input['mixture_prod_id'])->withInput()->withErrors($v);
        }
    }

    public function destroy($id)
    {
        $idx = explode('x', $id);
        $row = MixtureProdM2nProd::where('mixture_prod_id', '=', intval($idx[0]))->where('prod_id', '=', intval($idx[1]))->firstOrFail();

        if ($row) {
            $this->mpmp->find($row->id)->delete();
        }
        return Redirect::route('adm.pattern.mixtureprod.edit', $idx[0]);
    }

}