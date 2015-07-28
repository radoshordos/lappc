<?php

use Authority\Eloquent\FeedService;
use Authority\Eloquent\FeedServiceM2nColumn;

class FeedController extends BaseController
{
    public function show($execute = 'notfound')
    {
        $v = Validator::make(['execute' => $execute], FeedService::$rules);
        if ($v->passes()) {

            $feedService = FeedService::execute($execute)->first();
            $generate = new $feedService->class;
            $generate->feedRender($feedService->execute);
            file_put_contents($generate->getPublicFile($feedService->filename), $generate->getOut());


            /*
            $output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $output .= $generate->feedRender();
            $response = Response::make($output, 200);
            $response->header('Content-Type', 'text/xml');
            return $response;
            */
        } else {
            return Response::view('errors.missing', [], 404);
        }
    }
}