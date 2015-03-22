<?php

use Authority\Eloquent\MixtureItemM2nItem;

class MixtureItemM2nItemController extends \BaseController
{
    protected $mimi;

    function __construct(MixtureItemM2nItem $mimi)
    {
        $this->mimi = $mimi;
    }

    public function store()
    {
        $input = Input::all();
        $input_filter = array_only($input, ['mixture_item_id', 'item_id']);
        $v = Validator::make($input_filter, MixtureItemM2nItem::$rules);

        if (empty($input['item_id'])) {
            return Redirect::route('adm.pattern.mixtureitem.edit', [$input['mixture_item_id'], 'select_dev' => $input['select_dev']]);
        } else if ($v->passes()) {
            try {
                $this->mimi->create($input_filter);
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.pattern.mixtureitem.edit', [$input['mixture_item_id'], 'select_dev' => $input['select_dev']]);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixtureitem.edit', $input['mixture_item_id'])->withInput()->withErrors($v);
        }
    }

    public function destroy($id)
    {
        $idx = explode('x', $id);
        $row = MixtureItemM2nItem::where('mixture_item_id', '=', intval($idx[0]))->where('item_id', '=', intval($idx[1]))->firstOrFail();

        if ($row) {
            $this->mimi->find($row->id)->delete();
        }
        return Redirect::route('adm.pattern.mixtureitem.edit', $idx[0]);
    }
}