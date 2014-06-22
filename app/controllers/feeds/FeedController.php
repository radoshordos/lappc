<?php

use Authority\Eloquent\FeedDb;

class FeedController extends BaseController
{
    public function show($filname = 'notfound.xml')
    {
        $v = Validator::make(['filename' => $filname], FeedDb::$rules);

        if ($v->passes()) {

            $header = '<?xml version="1.0" encoding="UTF-8"?>';
            $response = Response::make($header.'<a>ANO</a>', 200);
            $response->header('Content-Type', 'text/xml');
            return $response;
        } else {
            return Response::view('errors.missing', array(), 404);
        }
    }
}