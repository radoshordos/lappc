<?php

use Authority\Eloquent\BuyOrderDb;
use Authority\Eloquent\RecordVisitorsHit;

class StatsBuyAccessHistoryController extends \BaseController
{
    public function index()
    {
        $clear = [
            'select_limit' => ['10' => 'Limit 10', '25' => 'Limit 25', '50' => 'Limit 50'],
            'choice_limit' => (isset($input['select_limit']) ? $input['select_limit'] : 10),
        ];

        $arr = [];
        $bod = BuyOrderDb::orderBy('id', 'DESC')->limit($clear['choice_limit']);

        if (!empty($bod)) {
            foreach ($bod as $row) {
                $arr[$row->id] = $row;
                $rvh = RecordVisitorsHit::where('remote_addr', '=', $row->remote_addr)->get();
                if (!empty($rvh)) {
                    foreach ($rvh as $val) {
                        $arr[$row->id][$val->id] = $val;
                    }
                }
            }
        }

        return View::make('adm.stats.buyaccesshistory.index', [
            'input'   => $clear,
            'history' => $arr,
        ]);
    }
}