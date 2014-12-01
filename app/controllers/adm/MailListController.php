<?php

class MailListController extends \BaseController
{
    public function index()
    {
        return View::make('adm.buy.maillist.index', [
         //   'mixturedev' => $this->mixture_dev->orderBy('id')->get()
        ]);
    }
}