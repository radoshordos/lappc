<?php

use Authority\Eloquent\Dev;

class DevController extends Controller {

    protected $dev;

    function __construct(Dev $dev)
    {
        $this->dev = $dev;
    }

	/**
	 * Display a listing of the resource.
	 * GET /adm/admin/dev
	 *
	 * @return Response
	 */
	public function index()
	{
        $devs = $this->dev->orderBy('id')->get();
        return View::make('adm.pattern.dev.index',array('devs'=> $devs));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adm/admin/dev/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('adm.pattern.dev.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adm/admin/dev
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adm/admin/dev/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /adm.admin.devs/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /adm.admin.devs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        return View::make('adm.pattern.dev.edit');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /adm.admin.devs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}