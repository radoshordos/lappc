<?php

use Authority\Eloquent\ViewProd;
use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Tools\SB;

class AkceController extends \BaseController
{
    public function index()
    {

        $akce = ViewProd::where('prod_mode_id', '=', '4')
            ->leftJoin('akce_template','view_prod.akce_template_id','=','akce_template.id')
            ->where('prod_name', 'LIKE', '%' . Input::get('search_name') . '%');

        if (Input::has('select_minitext')) {
            $akce->where('akce_template.minitext_id','=', Input::get('select_minitext'));
        }

        if (Input::has('select_availability')) {
            $akce->where('akce_template.availibility_id','=', Input::get('select_availability'));
        }

        if (Input::has('select_mixture_dev')) {
            $akce->whereIn('dev_id',MixtureDevM2nDev::select('dev_id')->where('mixture_dev_id','=',Input::get('select_mixture_dev'))->lists('dev_id'));
        }

        return View::make('adm.product.akce.index', [
            'akce'                => $akce->paginate(100),
            'search_name'         => Input::get('search_name'),
            'choice_minitext'     => Input::get('select_minitext'),
            'choice_availability' => Input::get('select_availability'),
            'choice_mixture_dev'  => Input::get('select_mixture_dev'),
            'select_minitext'     => SB::option('SELECT * FROM akce_minitext', ['id' => '->name'], true),
            'select_availability' => SB::option('SELECT * FROM akce_availability', ['id' => '->name'], true),
            'select_mixture_dev'  => SB::option("SELECT p.dev_id,md.id AS mdid,md.purpose,md.name
                                                 FROM mixture_dev_m2n_dev AS mdmd
                                                 INNER JOIN prod AS p ON mdmd.dev_id = p.dev_id
                                                 INNER JOIN mixture_dev as md ON md.id = mdmd.mixture_dev_id
                                                 WHERE p.mode_id = 4
                                                 ORDER BY md.purpose DESC,md.name", ['mdid' => '->name'], true)
        ]);
    }
}