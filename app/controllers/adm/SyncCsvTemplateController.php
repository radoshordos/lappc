<?php
use Authority\Eloquent\SyncCsvTemplate;
use Authority\Eloquent\SyncTemplateM2nColumn;
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
        $col = [];
        $tag = DB::table('sync_csv_template')
            ->select('id', DB::raw('(SELECT GROUP_CONCAT("<",sync_csv_column.element,">")
                                    FROM sync_template_m2n_column AS stmc
                                        INNER JOIN sync_csv_column ON sync_csv_column.id = stmc.column_id
                                        WHERE stmc.template_id = sync_csv_template.id
                                        ORDER BY stmc.id ) AS list
                                    '))
             ->get();

        if (!empty($tag)) {
            foreach ($tag as $val) {
                $col[$val->id] = $val->list;
            }
        }

        return View::make('adm.sync.template.index', [
            'template' => $this->template->orderBy('id')->get(),
            'tag' => (!empty($col) ? $col : NULL)
        ]);
    }

    public function create()
    {
        return View::make('adm.sync.template.create', [
            'select_mixture_dev' => SB::option("SELECT * FROM mixture_dev WHERE NOT purpose='autoall' ORDER BY purpose,name", ['id' => '->name'], true)
        ]);
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

        return View::make('adm.sync.template.edit', [
            'template' => $template,
            'm2n' => SyncTemplateM2nColumn::where('template_id', '=', $id)->orderBy('id')->get(),
            'select_column' => SB::option("SELECT *
                                                  FROM sync_csv_column
                                                  WHERE id NOT IN (
                                                      SELECT column_id
                                                      FROM sync_template_m2n_column AS stmc
                                                      WHERE stmc.template_id = $id)"
                , ['id' => '<->element> - ->desc'], true)
        ]);
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
            return Redirect::route('adm.product.prod.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.mixturedev.edit', $id)->withInput()->withErrors($v);
        }
    }
}