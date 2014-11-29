<?php

use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Eloquent\ViewProd;
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

        $template = SB::optionEloqent(AkceTempl::select(
            [
                DB::raw('(SELECT COUNT(akce.akce_id) FROM akce WHERE akce.akce_template_id = akce_template.id) AS akce_count'),
                'akce_template.id AS akce_template_id',
                'akce_template.bonus_title AS akce_template_bonus_title',
                'akce_availability.name AS akce_availability_name',
                'akce_minitext.name AS akce_minitext_name',
                'mixture_dev.name AS mixture_dev_name'
            ])
            ->join('mixture_dev', 'akce_template.mixture_dev_id', '=', 'mixture_dev.id')
            ->join('akce_availability', 'akce_template.availibility_id', '=', 'akce_availability.id')
            ->join('akce_minitext', 'akce_template.minitext_id', '=', 'akce_minitext.id')
            ->where('akce_template.id', '>', '1')
            ->get(), ['akce_template_id' => '[->mixture_dev_name] - [&#8721;=->akce_count] - [->akce_minitext_name] - [->akce_availability_name] - ->akce_template_bonus_title'], true);

        return View::make('adm.product.akce.index', [
            'akce'                => $akce->paginate(100),
            'search_name'         => Input::get('search_name'),
            'choice_minitext'     => Input::get('select_minitext'),
            'choice_availability' => Input::get('select_availability'),
            'choice_mixture_dev'  => Input::get('select_mixture_dev'),
            'choice_template'     => Input::get('select_template'),
            'select_template'     => $template,
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