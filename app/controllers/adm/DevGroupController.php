<?php

use Authority\Eloquent\DevGroup;
use Authority\Tools\SB;

class DevGroupController extends Controller
{

    protected $devgroup;

    function __construct(DevGroup $devgroup)
    {
        $this->devgroup = $devgroup;
    }

    /**
     * Display a listing of the resource.
     * GET /adm/pattern/devgroup
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
     * POST /adm/pattern/devgroup
     *
     * @return Response
     */

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, DevGroup::$rules);

        if ($v->passes()) {
            $this->devgroup->create($input);
            Session::flash('success', 'Nový záznam do skupiny výrobce byl přidán');
            return Redirect::route('adm.pattern.devgroup.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.devgroup.create')->withInput()->withErrors($v);
        }
    }

    /**
     * Display the specified resource.
     * GET /adm/pattern/devgroup/{id}
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
     * GET /adm/pattern/devgroup/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $devgroup = $this->devgroup->find($id);

        if (is_null($devgroup)) {
            return Redirect::route('adm.pattern.devgroup.index');
        }

        return View::make('adm.pattern.devgroup.edit', array(
            'dev_insertable' => ['' => ''] + SB::option("SELECT * FROM dev WHERE id > 1 AND id NOT IN (SELECT dev_id FROM dev_m2n_group WHERE group_id = $id) ORDER BY id", ['id' => '->name']),
            'devgroup' => $devgroup
        ));
    }

    /**
     * Update the specified resource in storage.
     * PUT /adm/pattern/devgroup/{id}
     *
     * @param  int $id
     * @return Response
     */

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $v = Validator::make($input, DevGroup::$rules);

        if ($v->passes()) {
            $devgroup = $this->devgroup->find($id);
            $devgroup->update($input);
            return Redirect::route('adm.pattern.devgroup.index', $id);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.devgroup.edit', $id)->withInput()->withErrors($v);
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /adm/pattern/devgroup/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}