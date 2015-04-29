<?php

class StatsBuyAccessHistoryController extends \BaseController {

    public function index()
    {
        return View::make('adm.stats.buyaccesshistory.index', []);
    }

}