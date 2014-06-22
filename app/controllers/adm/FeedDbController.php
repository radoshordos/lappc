<?php

use Authority\Eloquent\FeedDb;

class FeedDbController extends \BaseController
{
    protected $feed;

    function __construct(FeedDb $feed)
    {
        $this->feed = $feed;
    }

    public function index()
    {
        $feed = $this->feed->orderBy('id')->get();

        return View::make('adm.admin.feed.index', array(
            'feed' => $feed
        ));
    }

    public function edit($id) {
        return View::make('adm.admin.feed.edit');
    }
}