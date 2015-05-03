<?php

use Authority\Eloquent\RecordVisitorsHit;

class StatsUserAccessHistoryController extends \BaseController
{
    public function index()
    {
        $input = Input::all();
        $clear = [
            'select_limit' => ['50' => 'Limit 50', '500' => 'Limit 500', '1000' => 'Limit 1000'],
            'choice_limit' => (isset($input['select_limit']) ? $input['select_limit'] : 50),
            'remote_addr'  => (isset($input['remote_addr']) ? $input['remote_addr'] : NULL),
            'http_referer' => (isset($input['http_referer']) ? $input['http_referer'] : NULL),
            'request_uri'  => (isset($input['request_uri']) ? $input['request_uri'] : NULL)
        ];

        $hit = RecordVisitorsHit::orderBy('id', 'DESC')->limit($clear['choice_limit']);

        if (isset($input['remote_addr'])) {
            $hit->where('remote_addr', 'LIKE', '%' . $input['remote_addr'] . '%');
        }

        if (isset($input['http_referer'])) {
            $hit->where('http_referer', 'LIKE', '%' . $input['http_referer'] . '%');
        }

        if (isset($input['request_uri'])) {
            $hit->where('request_uri', 'LIKE', '%' . $input['request_uri'] . '%');
        }

        return View::make('adm.stats.useraccesshistory.index', [
            'input' => $clear,
            'hit'   => $hit->get()
        ]);
    }
}