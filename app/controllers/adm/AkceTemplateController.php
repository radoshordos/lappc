<?php

use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\AkceMinitext;
use Authority\Tools\SB;

class AkceTemplateController extends \BaseController
{
    protected $akcetemplate;

    function __construct(AkceTempl $akcetemplate)
    {
        $this->akcetemplate = $akcetemplate;
    }

    public function index()
    {
        return View::make('adm.product.akcetemplate.index', [
            'akcetemplate' => $this->akcetemplate->orderBy('id')->get()
        ]);
    }

    public function create()
    {
        return View::make('adm.product.akcetemplate.create', [
            'select_mixture_dev'  => SB::option("SELECT * FROM mixture_dev ORDER BY name,id", ['id' => '->name - [Výrobců &#8721;:->trigger_column_count]'], true),
            'select_minitext'     => SB::optionEloqent(AkceMinitext::select(['id','name'])->orderBy('origin','DESC')->orderBy('name')->get(), ['id' => '->name'], true),
            'select_availability' => SB::option("SELECT * FROM akce_availability ORDER BY name", ['id' => '->name'], true),
            'select_mixture_item' => SB::option("SELECT * FROM mixture_item ORDER BY name", ['id' => '->name'], true)
        ]);
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, AkceTempl::$rules);

        if ($v->passes()) {
            try {
                $this->akcetemplate->create($input);
                Session::flash('success', 'Nová šablona akce byla přidána');
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.product.akcetemplate.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.product.akcetemplate.create')->withInput()->withErrors($v);
        }
    }
}