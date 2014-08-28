<?php

use Authority\Eloquent\AkceAvailability;

class AkceAvailabilityController extends \BaseController
{
    protected $aa;

    function __construct(AkceAvailability $aa)
    {
        $this->aa = $aa;
    }

    public function index()
    {

        return View::make('adm.product.akceavailability.index', array(
            'aa' => $this->aa->orderBy('id')->get()
        ));
    }
}