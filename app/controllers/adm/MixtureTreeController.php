<?php

use Authority\Eloquent\MixtureTree;
use Authority\Tools\SB;

class MixtureTreeController extends \BaseController
{
    protected $mixturetree;

    function __construct(MixtureTree $mixturetree)
    {
        $this->mixturetree = $mixturetree;
    }

    public function index()
    {
        return View::make('adm.pattern.mixturetree.index', [
            'mixturetree' => $this->mixturetree->orderBy('id')->get()
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.mixturetree.create');
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureTree::$rules);

        if ($v->passes()) {
            $this->mixturetree->create($input);
            Session::flash('success', 'Nový záznam do grupy skupin byl přidán');
            return Redirect::route('adm.pattern.mixturetree.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturetree.create')->withInput()->withErrors($v);
        }
    }

    public function edit($id)
    {
        $mixture_tree = $this->mixturetree->find($id);

        if (is_null($mixture_tree)) {
            return Redirect::route('adm.pattern.mixturetree.index');
        }

        return View::make('adm.pattern.mixturedev.edit', [
            'tree_insertable' => [''] + SB::option("SELECT * FROM tree WHERE id > 1 AND id NOT IN (SELECT tree_id FROM mixture_tree_m2n_tree WHERE mixture_tree_id = $id) ORDER BY id", ['id' => '->name']),
            'mixturetree'     => $mixture_tree
        ]);
    }

}