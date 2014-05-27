<?php

use Authority\Xml\FeedReader;

class Ppc2manual2importController extends Controller
{
    public function show()
    {
        if (Input::has('url-file')) {
            try {
                $contents = file_get_contents(Input::get('url-file'));
                $fr = new FeedReader($contents);
                Session::flash('success', 'Přečteno '. $fr->getCount(). ' záznamů');
                return View::make('adm.ppc.manual2import.show', array('source' => $fr->getArr(), 'count' => $fr->getCount()));
            } catch (ErrorException $e) {
                Session::flash('error', $e->getMessage());
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                die("The file doesn't exist");
            }
        }
        return View::make('adm.ppc.manual2import.show');
    }
}