<?php

use Authority\Eloquent\Tree;
use Authority\Eloquent\TreeText;
use Authority\Tools\SB;

class TreeTextController extends \BaseController
{
    public function index($id = 0)
    {
        return View::make('adm.pattern.treetext.index', [
            'list' => TreeText::get()
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.treetext.create', [
            'tree_for_text' => SB::optionEloqent(Tree::select(['tree.id', 'tree.name'])->whereBetween('group_id', [50, 59])
                ->leftJoin('tree_text', 'tree.id', '=', 'tree_text.tree_id')
                ->whereNull('text')
                ->get(), ['id' => '[->id] - ->name'], FALSE)
        ]);
    }

    public function edit($id)
    {
        return View::make('adm.pattern.treetext.edit', [

        ]);
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, TreeText::$rules);

        if ($v->passes()) {
            try {
                TreeText::create($input);
                Session::flash('success', 'Přidán text do skupiny');
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.pattern.treetext.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.treetext.create')->withInput()->withErrors($v);
        }
    }
}