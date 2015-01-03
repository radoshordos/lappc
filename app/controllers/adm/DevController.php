<?php

use Authority\Eloquent\Dev;
use Authority\Eloquent\SyncDb;
use Authority\Tools\SB;

class DevController extends \BaseController
{

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
		return View::make('adm.pattern.dev.index', [
			'devs'     => $this->dev->where('id', '>', '1')->orderBy('id')->get(),
			'dev_sync' => SyncDb::distinct()->select('dev_id')->where('purpose', '=', 'autosync')->lists('dev_id')
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adm/admin/dev/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('adm.pattern.dev.create', [
			'select_warranty'     => [''] + SB::option("SELECT * FROM prod_warranty", ['id' => '->name']),
			'select_sale'         => [''] + SB::option("SELECT * FROM prod_sale", ['id' => '->desc']),
			'select_availability' => [''] + SB::option("SELECT * FROM items_availability WHERE id > 1", ['id' => '->name'])
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adm/admin/dev
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$input['alias'] = strtolower($input['name']);
		$v = Validator::make($input, Dev::$rules);

		if ($v->passes()) {
			$this->dev->create($input);
			Session::flash('success', 'Nový záznam výrobce byl přidán');
			return Redirect::route('adm.pattern.dev.index');
		} else {
			Session::flash('error', implode('<br />', $v->errors()->all(':message')));
			return Redirect::route('adm.pattern.dev.create')->withInput()->withErrors($v);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /adm/admin/dev/{id}/edit
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		$dev = $this->dev->find($id);

		if (is_null($dev)) {
			return Redirect::route('adm.pattern.dev.index');
		}

		return View::make('adm.pattern.dev.edit', [
			'dev'                 => $dev,
			'select_warranty'     => SB::option("SELECT * FROM prod_warranty", ['id' => '->name']),
			'select_sale'         => SB::option("SELECT * FROM prod_sale", ['id' => '->desc']),
			'select_availability' => SB::option("SELECT * FROM items_availability WHERE id > 1", ['id' => '->name'])
		]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /adm/admin/dev/{id}
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = Dev::$rules;
		if ($id !== NULL) {
			$rules['id'] .= ",$id";
			$rules['name'] .= ",$id";
			$rules['alias'] .= ",$id";
		}

		$input = array_except(Input::all(), '_method');
		$v = Validator::make($input, $rules);

		if ($v->passes()) {
			$dev = $this->dev->find($id);
			try {
				$dev->update($input);
			} catch (Exception $e) {
				Session::flash('error', $e->getMessage());
			}
			return Redirect::route('adm.pattern.dev.index');
		} else {
			Session::flash('error', implode('<br />', $v->errors()->all(':message')));
			return Redirect::route('adm.pattern.dev.edit', $id)->withInput()->withErrors($v);
		}
	}
}