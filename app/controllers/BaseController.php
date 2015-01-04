<?php

class BaseController extends Controller
{
    const PAGINATE_PAGE = 24;

    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

}