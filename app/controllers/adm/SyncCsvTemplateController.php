<?php
use Authority\Eloquent\SyncCsvTemplate;

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
}