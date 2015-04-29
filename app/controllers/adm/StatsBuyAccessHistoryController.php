<?php

use Authority\Eloquent\BuyOrderDb;
use Authority\Eloquent\RecordVisitorsHit;

class StatsBuyAccessHistoryController extends \BaseController
{
    public function index()
    {
        $arr = [];
        $input = Input::all();
        $clear = [
            'select_limit' => ['10' => 'Limit 10', '25' => 'Limit 25', '50' => 'Limit 50'],
            'choice_limit' => (isset($input['select_limit']) ? $input['select_limit'] : 10),
        ];

        $bod = BuyOrderDb::orderBy('id', 'DESC')->limit($clear['choice_limit'])->get();

        if (!empty($bod)) {
            foreach ($bod as $row) {
                $row = $row->toArray();
                $arr[$row['id']]['buy'] = $row;
                $arr[$row['id']]['hit'] = RecordVisitorsHit::where('remote_addr', '=', $arr[$row['id']]['buy']['remote_addr'])->orderBy('id', 'DESC')->get();
            }
        }

        return View::make('adm.stats.buyaccesshistory.index', [
            'input'   => $clear,
            'history' => $arr,
        ]);
    }
}