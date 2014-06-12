<?php

use Authority\Eloquent\DevGroup;

class DevGroupController extends Controller
{

    protected $devgroup;

    function __construct(DevGroup $devgroup)
    {
        $this->devgroup = $devgroup;
    }

    /**
     * Display a listing of the resource.
     * GET /adm/admin/dev
     *
     * @return Response
     */
    public function index()
    {
        $devgroup = $this->devgroup->orderBy('name')->get();
        return View::make('adm.pattern.devgroup.index', array('devgroup' => $devgroup));
    }

    /**
     * Show the form for creating a new resource.
     * GET /adm/admin/dev/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('adm.pattern.devgroup.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /adm/admin/dev
     *
     * @return Response
     */
    public function store()
    {
        return Redirect::route('adm.ppc.devgroup.create');
    }

    /**
     * Display the specified resource.
     * GET /adm/admin/dev/{id}
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        return View::make('adm.pattern.devgroup.edit');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /adm.admin.devs/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}