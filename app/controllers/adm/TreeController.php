<?php

use Authority\Eloquent\Tree;
use Authority\Tools\SB;
use Authority\Tools\ToolTree;

class TreeController extends \BaseController
{
    protected $tree;

    function __construct(Tree $tree)
    {
        $this->tree = $tree;
    }

    public function index()
    {
        $input = Input::all();

        $tree = $this->tree
            ->deep(Input::get('deep'))
            ->groupId(Input::get('treegroup'))
            ->where('id', '>', '1')
            ->where('position', '>', '0')
            ->where('desc', 'LIKE', '%' . Input::get('search_desc') . '%')
            ->orderBy('id')
            ->limit(Input::get('limit'))
            ->get();

        return View::make('adm.pattern.tree.index', [
            'trees'        => $tree,
            'input'        => $input,
            'search_desc'  => Input::get('search_desc'),
            'select_group' => SB::option("SELECT * FROM tree_group WHERE grouptop_id = 20 AND for_prod = 1", ['id' => '[->id] - ->name'])
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.tree.create', [
            'select_parent' => SB::option("SELECT * FROM tree", ['id' => '[->id] - ->absolute - ->desc'], true)
        ]);
    }

    public function store()
    {
        $input = Input::all();
        $input['id'] = ToolTree::calculateId($input['parent_id'], $input['position']);
        $input['group_id'] = ToolTree::calculateGroupId($input['id']);
        $data = DB::table('tree')
            ->select('absolute')
            ->where('id', '=', $input['parent_id'])
            ->first();

        $input['absolute'] = (empty($data->absolute) ? $input['relative'] : implode('/', [$data->absolute, $input['relative']]));
        $v = Validator::make($input, Tree::$rules);

        if ($v->passes()) {
            try {
                $this->tree->create($input);
                Session::flash('success', 'Nová skupina produktů byla přidána');
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            DB::statement('CALL proc_tree_recalculate');
            return Redirect::route('adm.pattern.tree.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.tree.create')->withInput()->withErrors($v);
        }
    }

    public function edit($id)
    {
        $tree = $this->tree->find($id);

        if (is_null($tree)) {
            return Redirect::route('adm.pattern.tree.index');
        }

        return View::make('adm.pattern.tree.edit', [
            'tree'          => $tree,
            'select_dev'    => SB::option("SELECT * FROM dev", ['id' => '->name']),
            'select_parent' => SB::option("SELECT * FROM tree WHERE deep <= 2", ['id' => '[->id] - ->desc'])
        ]);
    }

    public function update($id)
    {
        $tt = new ToolTree();
        $input = array_except(Input::all(), '_method');
        $input['category_text'] = $tt->getCategoryText($input['id']);

        $v = Validator::make($input, Tree::$rules);

        if ($v->passes()) {
            try {
                $tree = $this->tree->find($id);
                $tree->update($input);
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.pattern.tree.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.tree.index', $id)->withInput()->withErrors($v);
        }
    }
}