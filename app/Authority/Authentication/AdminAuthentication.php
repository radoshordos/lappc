<?php

namespace Authority\Authentication;

abstract class AdminAuthentication extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter('inGroup:Admins');
    }
}