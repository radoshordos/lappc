<?php

namespace Authority\Authentication;

abstract class PowerAuthentication extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter('inGroup:Power');
    }
}