<?php

class PohodaApiTestController extends Controller
{
    public function index()
    {
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://api.github.com/user', ['auth' => ['user', 'pass']]);
        echo $res->getStatusCode();
    }
}