<?php

use Authority\Eloquent\Tree;
use Authority\Tools\ToolTree;
use Authority\Tools\SB;


class TreeController extends \BaseController
{

    protected $tree;

    function __construct(Tree $tree)
    {
        $this->tree = $tree;
    }

    /**
     * Display a listing of the resource.
     * GET /adm/pattern/tree
     *
     * @return Response
     */

    public function index()
    {

        $input = Input::all();

        $tree = $this->tree
            ->deep(Input::get('deep'))
            ->groupId(Input::get('treegroup'))
            ->where('id', '>', '1')
            ->where('position', '>', '0')
            ->orderBy('id')
            ->limit(Input::get('limit'))
            ->get();

        return View::make('adm.pattern.tree.index', array(
            'trees' => $tree,
            'input' => $input,
            'select_group' => SB::option("SELECT * FROM tree_group WHERE grouptop_id = 20 AND for_prod = 1", ['id' => '[->id] - ->name'])
        ));
    }

    /**
     * Show the form for creating a new resource.
     * GET /adm/pattern/tree/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('adm.pattern.tree.create', array(
            'select_parent' => [''] + SB::option("SELECT * FROM tree", ['id' => '[->id] - ->absolute - ->desc'])
        ));
    }

    /**
     * Store a newly created resource in storage.
     * POST /adm/pattern/tree
     *
     * @return Response
     */
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
            DB::statement('CALL tree_recalculate');
            return Redirect::route('adm.pattern.tree.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.tree.create')->withInput()->withErrors($v);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * GET /adm/pattern/tree/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $tree = $this->tree->find($id);

        if (is_null($tree)) {
            return Redirect::route('adm.pattern.tree.index');
        }

        return View::make('adm.pattern.tree.edit', array(
            'tree' => $tree,
            'select_parent' => SB::option("SELECT * FROM tree", ['id' => '[->id] - ->name'])
        ));
    }

    /**
     * Update the specified resource in storage.
     * PUT /adm/pattern/tree/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /adm/pattern/tree/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}