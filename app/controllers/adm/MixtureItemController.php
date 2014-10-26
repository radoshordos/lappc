<?php

use Authority\Eloquent\MixtureItem;
use Authority\Tools\SB;

class MixtureItemController extends \BaseController
{
    protected $mi;

    function __construct(MixtureItem $mi)
    {
        $this->mi = $mi;
    }

    public function index()
    {
        return View::make('adm.pattern.mixtureitem.index', [
            'mixtureitem' => $this->mi->orderBy('id')->get()
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.mixtureitem.create');
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureItem::$rules);

        if ($v->passes()) {
            $this->mi->create($input);
            Session::flash('success', 'Nový záznam do grupy položek byl přidán');
            return Redirect::route('adm.pattern.mixtureitem.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixtureitem.create')->withInput()->withErrors($v);
        }
    }

    public function edit($id)
    {
        $mixitem = $this->mi->find($id);

        if (is_null($mixitem)) {
            return Redirect::route('adm.pattern.mixtureitem.index');
        }

        return View::make('adm.pattern.mixtureitem.edit', [
            'item_insertable' => [''] + SB::option("SELECT * FROM items WHERE id > 1 AND id NOT IN (SELECT item_id FROM mixture_item_m2n_item WHERE mixture_item_id = $id) ORDER BY id", ['id' => '->id']),
            'mixtureitem'     => $mixitem
        ]);
    }

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $v = Validator::make($input, MixtureItem::$rules);

        if ($v->passes()) {
            $mixitem = $this->mi->find($id);
            $mixitem->update($input);
            return Redirect::route('adm.pattern.mixtureitem.index', $id);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixtureitem.edit', $id)->withInput()->withErrors($v);
        }
    }

}