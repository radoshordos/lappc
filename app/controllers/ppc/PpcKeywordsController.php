<?php

class PpcKeywordsController extends Controller
{

    protected $keyword;

    function __construct(\Authority\Eloquent\PpcKeywords $keyword)
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
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /adm/ppc/keywords/keyword
     *
     * @return Response
     */
    public function store()
    {
        //
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
        //
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
        //
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
        //
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