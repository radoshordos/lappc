<?php

use Authority\Eloquent\FeedService;

class FeedController extends BaseController
{
    public function show($filname = 'notfound.xml')
    {
        $v = Validator::make(['filename' => $filname], FeedService::$rules);
        if ($v->passes()) {
            $feedService = FeedService::filename($filname)->first();


            $header = '<?xml version="1.0" encoding="UTF-8"?>';
            $response = Response::make($header.'<a>'.$feedService['id'].'</a>', 200);
            $response->header('Content-Type', 'text/xml');
            return $response;
        } else {
            return Response::view('errors.missing', array(), 404);
        }
    }
}