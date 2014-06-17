<?php

use Authority\Eloquent\DevM2nGroup;

class DevM2nGroupController extends Controller
{
    protected $dev_m2n_group;

    function __construct(DevM2nGroup $dev_m2n_group)
    {
        $this->dev_m2n_group = $dev_m2n_group;
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, DevM2nGroup::$rules);

        if ($v->passes()) {
            $this->dev_m2n_group->create($input);
            return Redirect::route('adm.pattern.devgroup.edit', $input['group_id']);

        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.devgroup.edit', $input['group_id'])->withInput()->withErrors($v);
        }
    }

    public function destroy($id)
    {
        $idx = explode('x', $id);
        $row = DevM2nGroup::where('group_id', '=', intval($idx[0]))->where('dev_id', '=', intval($idx[1]))->firstOrFail();

        $this->dev_m2n_group->find($row->id)->delete();
        return Redirect::route('adm.pattern.devgroup.edit', $idx[0]);
    }

}
