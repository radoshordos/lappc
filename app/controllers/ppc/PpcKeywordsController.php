<?php

use \Authority\Eloquent\PpcKeywords;

class PpcKeywordsController extends Controller
{

    protected $keyword;

    function __construct(PpcKeywords $keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * Display a listing of the resource.
     * GET /adm/ppc/keywords
     *
     * @return Response
     */
    public function index()
    {
        $keywords = $this->keyword->all();
        return View::make('adm.ppc.keywords.index', compact('keywords'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /adm/ppc/keywords/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('adm.ppc.keywords.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /adm/ppc/keywords/keyword
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, PpcKeywords::$rules);

        if ($v->passes()) {
            $this->keyword->create($input);
            return View::make('adm.ppc.keywords.index');
        }
        return View::route('adm.ppc.keywords.create')
            ->withInput()
            ->withErrors($v)
            ->with('message', 'Validační chaba');
    }

    /**
     * Display the specified resource.
     * GET /adm/ppc/keywords/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $keyword = $this->keyword->findOrFail($id);
        return View::make('adm.ppc.keywords.show', compact('keywords'));
    }

    /**
     * Show the form for editing the specified resource.
     * GET /adm/ppc/keywords/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $keyword = $this->keyword->find($id);

        if (is_null($keyword)) {
            return Redirect::route('adm.ppc.keywords.index');
        }

        return View::make('adm.ppc.keywords.edit', compact('keyword'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /adm/ppc/keywords/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $v = Validator::make($input, PpcKeywords::$rules);

        if ($v->passes()) {
            $keyword = $this->keyword->find($id);
            $keyword->update($input);

            return View::make('adm.ppc.keywords.show', $id);
        }
        return View::route('adm.ppc.keywords.edit', $id)
            ->withInput()
            ->withErrors($v)
            ->with('message', 'Validační chaba');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /adm/ppc/keywords/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->keyword->find($id)->delete();
        return Redirect::route('adm.ppc.keywords.index');
    }
}