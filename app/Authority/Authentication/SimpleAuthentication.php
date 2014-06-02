<?php

namespace Authority\Authentication;

abstract class SimpleAuthentication extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter('inGroup:Simple');
    }
}