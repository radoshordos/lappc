<?php

use Authority\Eloquent\FeedService;
use Authority\Eloquent\FeedServiceM2nColumn;
use Authority\Eloquent\ViewProd;

class FeedController extends BaseController
{
    public function show($filname = 'notfound.xml')
    {
        $v = Validator::make(['filename' => $filname], FeedService::$rules);
        if ($v->passes()) {

            $feedService = FeedService::filename($filname)->first();

            $columns = FeedServiceM2nColumn::with('FeedColumn')
                ->where('service_id','=',$feedService->id)
                ->where('value','=',1)
                ->get();


            $xml = View::make('feed.shopfeed', array(
                'columns' => $columns,
                'data' => ViewProd::all()
            ));

            $response = Response::make($xml, 200);
            $response->header('Content-Type', 'text/xml');
            return $response;
        } else {
            return Response::view('errors.missing', array(), 404);
        }
    }
}