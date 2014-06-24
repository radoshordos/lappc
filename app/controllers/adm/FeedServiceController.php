<?php

use Authority\Eloquent\FeedService;
use Authority\Eloquent\FeedColumn;
use Authority\Eloquent\FeedServiceM2nColumn;


class FeedServiceController extends \BaseController
{
    protected $feed;

    function __construct(FeedService $feed)
    {
        $this->feed = $feed;
    }

    public function index()
    {
        return View::make('adm.admin.feed.index', array(
            'feed' => $this->feed->orderBy('id')->get()
        ));
    }

    public function edit($id)
    {
        $service = FeedColumn::with(array('feedService' => function($query) use ($id)
        {
            $query->where('service_id', '=', $id);

        }))->get();

        return View::make('adm.admin.feed.edit', array(
            'feed' => $this->feed->find($id),
            'service' => $service
        ));
    }

    public function update($id)
    {
        $values = Input::get('value');

        if (count($values) > 0) {
            foreach ($values as $key => $val) {

                $fsmc = FeedServiceM2nColumn::firstOrNew(array('service_id' => $id, 'column_id' => $key));
                $fsmc->value = $val;
                $fsmc->save();
            }
        }

        return Redirect::route('adm.admin.feed.index');
    }

}