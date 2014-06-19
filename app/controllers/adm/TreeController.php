<?php

use Authority\Eloquent\Tree;
use Authority\Tools\SB;

class TreeController extends \BaseController {

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
        $tree = $this->tree->where('id','>','1')->orderBy('id')->get();
        return View::make('adm.pattern.tree.index', array('trees' => $tree));
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /adm/pattern/tree/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adm/pattern/tree
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /adm/pattern/tree/{id}/edit
	 *
	 * @param  int  $id
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
            'select_parent' => SB::option("SELECT * FROM tree", ['id' => '[->id] - ->name']),
        ));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /adm/pattern/tree/{id}
	 *
	 * @param  int  $id
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}