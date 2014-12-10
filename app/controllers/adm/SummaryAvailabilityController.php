<?php

use Authority\Eloquent\ItemsAvailability;

class SummaryAvailabilityController extends \BaseController
{
    protected $ia;

    function __construct(ItemsAvailability $ia)
    {
        $this->ia = $ia;
    }

    public function index()
    {
        if (Request::isMethod('post')) {
            foreach (Input::get('visible') as $key => $val) {
                DB::update('UPDATE items_availability SET visible = ? WHERE id = ?', [$val, $key]);
            }
        }

        return View::make('adm.summary.availability.index', [
            'ia' => DB::table('items_availability')
                ->select(['items_availability.*',
                    DB::raw('(SELECT COUNT(*) FROM items WHERE items.availability_id = items_availability.id) AS availability_items'),
                    DB::raw('(SELECT COUNT(*) FROM akce WHERE akce.availability_id = items_availability.id) AS availability_akce')
                ])
                ->groupBy('items_availability.id')
                ->get()
        ]);
    }
}