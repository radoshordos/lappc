<?php

use \Authority\Eloquent\MediaVariations;

class MediaVariationsController extends \BaseController
{
    public function index()
    {
        return View::make('adm.summary.mediavariations.index', [
            "mv" => MediaVariations::where('type_id', '>', '1')->orderBy('id')->get()
        ]);
    }
}