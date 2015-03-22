<?php

use Authority\Eloquent\MixtureItem;
use Authority\Eloquent\Dev;
use Authority\Tools\SB;

class MixtureItemController extends \BaseController
{
    protected $mi;
    protected $pa;

    function __construct(MixtureItem $mi)
    {
        $this->mi = $mi;
        $this->pa = ['akce_items_free' => 'akce_items_free - Skupina akčních položek zdarma k prouktu'];
    }

    public function index()
    {
        return View::make('adm.pattern.mixtureitem.index', [
            'mixtureitem' => $this->mi->orderBy('id')->get()
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.mixtureitem.create', [
            'select_purpose' => $this->pa,
            'choice_purpose' => Input::get('select_purpose')
        ]);
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
        $choice_dev = Input::get('select_dev');

        if (is_null($mixitem)) {
            return Redirect::route('adm.pattern.mixtureitem.index');
        }

        return View::make('adm.pattern.mixtureitem.edit', [
            'select_dev'      => SB::optionEloqent(Dev::where('id', '>', '1')->orderBy('id')->get(), ['id' => '[->id] - ->name'], TRUE),
            'choice_dev'      => $choice_dev,
            'item_insertable' => SB::option("SELECT items.id AS items_id,prod.name AS prod_name
                                             FROM items
                                             INNER JOIN prod ON prod.id = items.prod_id
                                             WHERE dev_id = " . intval($choice_dev) . " AND items.id > 1 AND prod.ic_all = 1 AND items.id NOT IN (SELECT item_id FROM mixture_item_m2n_item WHERE mixture_item_id = $id)
                                             ORDER BY items.id", ['items_id' => '->prod_name'], true), 'mixtureitem' => $mixitem,
            'select_purpose'  => $this->pa,
            'choice_purpose'  => Input::get('select_purpose')
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