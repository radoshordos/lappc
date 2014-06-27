<?php

use Authority\Feed\Ppc\PpcReader;
use Authority\Eloquent\PpcDb;

class PpcImportController extends BaseController
{

    public function show()
    {
        if (Input::has('url-file')) {
            try {
                $contents = file_get_contents(Input::get('url-file'));
                $pr = new PpcReader($contents);
                return View::make('adm.ppc.import.show', array(
                    'input' => Input::all(),
                    'import_yes' => $pr->getImportYes(),
                    'import_no' => $pr->getImportNo()
                ));

            } catch (ErrorException $e) {
                Session::flash('error', $e->getMessage());
            }
        }
        return View::make('adm.ppc.import.show', array(
                'input' => Input::all())
        );
    }
}