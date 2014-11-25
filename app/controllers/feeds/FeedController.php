<?php

use Authority\Eloquent\FeedService;
use Authority\Eloquent\FeedServiceM2nColumn;

class FeedController extends BaseController
{
    public function show($filname = 'notfound.xml')
    {
        $v = Validator::make(['filename' => $filname], FeedService::$rules);
        if ($v->passes()) {

            $feedService = FeedService::filename($filname)->first();
            $generate = new $feedService->class;

            $output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $output .= $generate->feedRender();

            $response = Response::make($output, 200);
            $response->header('Content-Type', 'text/xml');
            return $response;
        } else {
            return Response::view('errors.missing', [], 404);
        }
    }
}