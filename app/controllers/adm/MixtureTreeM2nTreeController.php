<?php

use Authority\Eloquent\MixtureTreeM2nTree;

class MixtureTreeM2nTreeController extends \BaseController
{
    protected $mtmt;

    function __construct(MixtureTreeM2nTree $mtmt)
    {
        $this->mtmt = $mtmt;
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureTreeM2nTree::$rules);
        if ($v->passes()) {
            try {
                $this->mtmt->create($input);
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.pattern.mixturetree.edit', $input['mixture_tree_id']);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturetree.edit', $input['mixture_tree_id'])->withInput()->withErrors($v);
        }
    }

    public function destroy($id)
    {
        $idx = explode('x', $id);
        $row = MixtureTreeM2nTree::where('mixture_tree_id', '=', intval($idx[0]))->where('tree_id', '=', intval($idx[1]))->firstOrFail();

        if ($row) {
            $this->mtmt->find($row->id)->delete();
        }
        return Redirect::route('adm.pattern.mixturetree.edit', $idx[0]);
    }

}