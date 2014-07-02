<?php
use Authority\Eloquent\SyncCsvTemplate;
use Authority\Tools\SB;

class SyncCsvTemplateController extends \BaseController
{
    protected $template;

    function __construct(SyncCsvTemplate $template)
    {
        $this->template = $template;
    }

    public function index()
    {
        return View::make('adm.sync.template.index', array(
            'template' => $this->template->orderBy('id')->get()
        ));
    }

    public function create()
    {
        return View::make('adm.sync.template.create', array(
            'select_mixture_dev' => [''] + SB::option("SELECT * FROM mixture_dev ORDER BY purpose DESC", ['id' => '->name'])
        ));
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, SyncCsvTemplate::$rules);

        if ($v->passes()) {
            try {
                $this->template->create($input);
                Session::flash('success', 'Nová .csv šablona založena');
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.sync.template.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.sync.template.create')->withInput()->withErrors($v);
        }
    }

    public function edit($id)
    {
        $template = $this->template->find($id);

        if (is_null($template)) {
            return Redirect::route('adm.sync.template.index');
        }

        return View::make('adm.sync.template.edit', array(
            'template' => $template,
            'select_column' => [''] + SB::option("SELECT * FROM sync_csv_column", ['id' => '<->element> - ->desc'])
        ));
    }

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $v = Validator::make($input, SyncCsvTemplate::$rules);

        if ($v->passes()) {
            try {
                $dev = $this->mixture_dev->find($id);
                $dev->update($input);
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.pattern.prod.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturedev.edit', $id)->withInput()->withErrors($v);
        }
    }

}