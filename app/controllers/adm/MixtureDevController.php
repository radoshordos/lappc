<?php

use Authority\Eloquent\MixtureDev;
use Authority\Tools\SB;

class MixtureDevController extends \BaseController
{
    protected $mixture_dev;

    function __construct(MixtureDev $mixture_dev)
    {
        $this->mixture_dev = $mixture_dev;
    }

    /**
     * Display a listing of the resource.
     * GET /adm/pattern/mixturedev
     *
     * @return Response
     */
    public function index()
    {
        $mixture_dev = $this->mixture_dev->orderBy('id')->get();
        return View::make('adm.pattern.mixturedev.index', array('mixturedev' => $mixture_dev));
    }

    /**
     * Show the form for creating a new resource.
     * GET /adm/admin/dev/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('adm.pattern.mixturedev.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /adm/pattern/mixturedev
     *
     * @return Response
     */

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MixtureDev::$rules);

        if ($v->passes()) {
            $this->mixture_dev->create($input);
            Session::flash('success', 'Nový záznam do skupiny výrobce byl přidán');
            return Redirect::route('adm.pattern.mixturedev.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturedev.create')->withInput()->withErrors($v);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * GET /adm/pattern/mixturedev/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $mixture_dev = $this->mixture_dev->find($id);

        if (is_null($mixture_dev)) {
            return Redirect::route('adm.pattern.mixturedev.index');
        }

        return View::make('adm.pattern.mixturedev.edit', array(
            'dev_insertable' => [''] + SB::option("SELECT * FROM dev WHERE id > 1 AND id NOT IN (SELECT dev_id FROM mixture_dev_m2n_dev WHERE mixture_dev_id = $id) ORDER BY id", ['id' => '->name']),
            'mixturedev' => $mixture_dev
        ));
    }

    /**
     * Update the specified resource in storage.
     * PUT /adm/pattern/mixturedev/{id}
     *
     * @param  int $id
     * @return Response
     */

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $v = Validator::make($input, MixtureDev::$rules);

        if ($v->passes()) {
            $mixture_dev = $this->mixture_dev->find($id);
            $mixture_dev->update($input);
            return Redirect::route('adm.pattern.mixturedev.index', $id);
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturedev.edit', $id)->withInput()->withErrors($v);
        }
    }

}