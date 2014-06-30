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
            'select_column' => [''] + SB::option("SELECT * FROM sync_csv_column", ['id' => '<->element> - ->desc'])
        ));
    }
}