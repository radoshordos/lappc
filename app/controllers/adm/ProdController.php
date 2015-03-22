<?php

use Authority\Eloquent\Akce;
use Authority\Eloquent\AkceTempl;
use Authority\Eloquent\AkceSale;
use Authority\Eloquent\Items;
use Authority\Eloquent\MixtureDevM2nDev;
use Authority\Eloquent\Prod;
use Authority\Eloquent\Dev;
use Authority\Eloquent\ProdDescription;
use Authority\Eloquent\ProdDifferenceM2nSet;
use Authority\Eloquent\ProdPicture;
use Authority\Eloquent\ViewProd;
use Authority\Eloquent\Tree;
use Authority\Eloquent\SyncDb;
use Authority\Mapper\CreateProdModel;
use Authority\Tools\Grab\Manipulation;
use Authority\Tools\Image\ProdImage;
use Authority\Tools\SB;
use Authority\Tools\SF;

class ProdController extends \BaseController
{
    protected $prod;
    protected $items;

    protected $prod_input_fields = [
        'tree_id', 'dev_id', 'mode_id', 'warranty_id', 'forex_id', 'sale_id',
        'dph_id', 'price', 'alias', 'name', 'desc', 'transport_weight', 'transport_atypical'
    ];

    protected $items_input_fields = [
        'visible', 'diff_val1_id', 'diff_val2_id', 'code_prod', 'code_ean', 'availability_id'
    ];

    function __construct(Prod $prod, ViewProd $view, Items $items)
    {
        $this->prod = $prod;
        $this->items = $items;
    }

    public function create()
    {
        $input = Input::all();
        $cpm = new CreateProdModel();

        if (intval(Input::get('sync_id')) > 0) {
            $sdb = SyncDb::find(Input::get('sync_id'));
            if (!empty($sdb)) {
                $sync = $sdb->toArray();
                $cpm->setProdDevId($sync["dev_id"]);
                $cpm->setProdName($sync["name"]);
                $cpm->setProdDesc($sync["desc"]);
                $cpm->setItemsCodeProd($sync["code_prod"]);
                $cpm->setItemsCodeEan($sync["code_ean"]);
                $cpm->setProdPrice($sync["price_standard"]);
                $cpm->setProdTransportWeight("weight");

                if ($sync["dev_id"] > 0) {
                    $dev = Dev::where('id', '=', $sync["dev_id"])->first();
                    $cpm->setProdWarrantyId($dev->default_warranty_id);
                    $cpm->setProdSaleId($dev->default_sale_prod_id);
                    $cpm->setProdActionSaleId($dev->default_sale_action_id);
                    $cpm->setItemsAvailabilityId($dev->default_availability_id);
                }
            }
        }
        if (URL::isValidUrl(Input::get('urlimg')) && intval(Input::get('grab_profile')) > 0) {
            $man = new Manipulation(Input::get('urlimg'), intval(Input::get('grab_profile')));
            $grab = $man->getNamespace();

            if (isset($grab['db']['imgs'])) {
                if (isset($grab['db']['imgs'][0])) {
                    $cpm->setProdPicture00($grab['db']['imgs'][0]);
                }

                for ($i = 1; $i < 13; $i++) {
                    if (isset($grab['db']['imgs'][$i])) {
                        $spp = "setProdPicture" . str_pad($i, 2, "0", STR_PAD_LEFT);
                        $cpm->$spp($grab['db']['imgs'][$i]);

                    }
                }
            }

            foreach ($grab as $key => $val) {
                switch ($key) {
                    case 'prod_id_dev' :
                        $cpm->setProdDevId($val);
                        break;
                    case 'prod_name' :
                        $cpm->setProdName($val);
                        break;
                    case 'prod_price' :
                        $cpm->setProdPrice($val);
                        break;
                    case 'prod_desc' :
                        $cpm->setProdDesc($val);
                        break;
                    case 'items_code_prod' :
                        $cpm->setItemsCodeProd($val);
                        break;
                    case 'items_code_ean' :
                        $cpm->setItemsCodeEan($val);
                        break;
                    case 'prod_nad1' :
                        $cpm->setProdDescriptionDataTitle1($val);
                        break;
                    case 'prod_nad2' :
                        $cpm->setProdDescriptionDataTitle2($val);
                        break;
                    case 'prod_nad3' :
                        $cpm->setProdDescriptionDataTitle3($val);
                        break;
                    case 'prod_txt1' :
                        $cpm->setProdDescriptionDataInput1($val);
                        break;
                    case 'prod_txt2' :
                        $cpm->setProdDescriptionDataInput2($val);
                        break;
                    case 'prod_txt3' :
                        $cpm->setProdDescriptionDataInput3($val);
                        break;
                }
            }
        }

        return View::make('adm.product.prod.create', [
            'input' => $input,
            'cpm' => $cpm,
            'select_tree' => SB::option("SELECT tree_id,tree_name,tree_absolute FROM view_tree WHERE tree_subdir_all = tree_dir_all AND tree_group_id BETWEEN 20 AND 39", ['tree_id' => '[->tree_id] - [->tree_absolute] - ->tree_name'], TRUE),
            'select_dev' => SB::option("SELECT id,name FROM dev WHERE id > 1", ['id' => '[->id] - ->name'], TRUE),
            'select_warranty' => SB::option("SELECT id,name FROM prod_warranty", ['id' => '->name']),
            'select_dph' => SB::option("SELECT id,name FROM dph WHERE visible = 1", ['id' => '->name']),
            'select_forex' => SB::option("SELECT id,currency FROM forex WHERE active = 1", ['id' => '->currency']),
            'select_mode' => SB::option("SELECT id,name FROM prod_mode WHERE visible = 1 AND id < 4", ['id' => '->name']),
            'select_sale' => SB::option("SELECT * FROM prod_sale WHERE visible = 1", ['id' => '->desc']),
            'select_difference' => SB::option("SELECT id,name,count FROM prod_difference WHERE visible = 1", ['id' => '->name [->count]']),
            'select_availability' => SB::option("SELECT id,name FROM items_availability WHERE visible = 1 AND id > 1", ['id' => '->name']),
            'select_media_var' => SB::option("SELECT id,name FROM media_variations WHERE type_id = 7", ['id' => '->name'], TRUE),
            'select_grab' => SB::option("SELECT id,name FROM grab_profile WHERE active = 1", ['id' => '->name'], TRUE)
        ]);
    }

    public function store()
    {
        $input = Input::all();
        if (Input::has('button-submit-create')) {

            $pinput = array_only($input, $this->prod_input_fields);
            $iinput = array_only($input, $this->items_input_fields);

            $pinput['alias'] = SF::friendlyAlias($input['name']);
            $pinput['search_alias'] = SF::friendlySearch($input['name']);
            $iinput['diff_val1_id'] = 1;
            $iinput['diff_val2_id'] = 1;

            $vp = Validator::make($pinput, Prod::$rules);
            $vi = Validator::make($iinput, Items::$rules);
            $tree = Tree::find($input['tree_id']);

            \DB::transaction(function () use ($vp, $vi, $pinput, $iinput, $input, $tree) {
                if ($vp->passes()) {
                    $prod_result = Prod::create($pinput);
                    if ($vi->passes()) {
                        Items::create(['prod_id' => $prod_result['id']] + array_filter($iinput));
                    } else {
                        Session::flash('error', implode('<br />', $vi->errors()->all(':message')));
                        \DB::rollback();
                        return Redirect::route('adm.product.prod.create')->withInput()->withErrors($vi);
                    }
                    Session::flash('success', "<a href=" . URL::route('adm.product.prod.edit', [$prod_result['tree_id'], $prod_result['id']]) . ">Nový produkt byl přidán</a>");
                } else {
                    Session::flash('error', implode('<br />', $vp->errors()->all(':message')));
                    \DB::rollback();
                    return Redirect::route('adm.product.prod.create')->withInput()->withErrors($vp);
                }

                if (intval($prod_result['id']) > 0 && intval($input['data_title1']) > 0 && strlen($input['data_input1']) > 0) {
                    ProdDescription::create(['prod_id' => $prod_result['id'], 'variations_id' => intval($input['data_title1']), 'data' => $input['data_input1']]);
                }
                if (intval($prod_result['id']) > 0 && intval($input['data_title2']) > 0 && strlen($input['data_input2']) > 0) {
                    ProdDescription::create(['prod_id' => $prod_result['id'], 'variations_id' => intval($input['data_title2']), 'data' => $input['data_input2']]);
                }
                if (intval($prod_result['id']) > 0 && intval($input['data_title3']) > 0 && strlen($input['data_input3']) > 0) {
                    ProdDescription::create(['prod_id' => $prod_result['id'], 'variations_id' => intval($input['data_title3']), 'data' => $input['data_input3']]);
                }

                try {
                    for ($i = 0; $i < 16; $i++) {
                        $picture = "prod_picture" . str_pad($i, 2, "0", STR_PAD_LEFT);
                        $pic = Input::get($picture);
                        if (!empty($pic)) {
                            $img = new ProdImage($pic, $tree->absolute, $input['name']);
                            $img->createProdPictures(240, 240);
                            if ($i == 0) {
                                $prod_result->img_big = $img->getImgBig();
                                $prod_result->img_normal = $img->getImgNormal();
                                $prod_result->save();
                            } else {
                                ProdPicture::create([
                                    'prod_id' => $prod_result->id,
                                    'img_big' => $img->getImgBig(),
                                    'img_normal' => $img->getImgNormal()
                                ]);
                            }
                        }
                    }
                } catch (Exception $e) {
                    \DB::rollback();
                    Session::flash('error', $e->getMessage());
                }
            });
        }
        return Redirect::route('adm.product.prod.create')->withInput();
    }

    public function index()
    {
        Input::has('select_limit') ? $input_limit = intval(Input::get('select_limit')) : $input_limit = 30;
        Input::has('select_sort') ? $input_sort = intval(Input::get('select_sort')) : $input_sort = 1;

        $db = ViewProd::tree(Input::get('select_tree'))
            ->where('prod_name', 'LIKE', '%' . Input::get('search_name') . '%');


        if (intval(Input::get('select_mixture_dev')) > 0) {
            $dev = \DB::table('mixture_dev_m2n_dev')->where('mixture_dev_id', Input::get('select_mixture_dev'))->lists('dev_id');
            $db->whereIn('view_prod.dev_id', $dev);
        }

        switch ($input_sort) {
            case 2:
                $db->orderBy('prod_name', 'DESC');
                break;
            case 3:
                $db->orderBy('prod_search_price', 'ASC');
                break;
            default:
                $db->orderBy('prod_updated_at', 'DESC');
                break;
        }

        if (Input::has('select_diff')) {
            $db->where('prod_difference_id', '=', Input::get('select_diff'));
        }

		return View::make('adm.product.prod.index', [
            'view' => $db->paginate($input_limit),
            'input_mixture_dev' => Input::has('select_mixture_dev') ? intval(Input::get('select_mixture_dev')) : NULL,
            'input_tree' => Input::has('select_tree') ? intval(Input::get('select_tree')) : NULL,
            'input_sort' => Input::has('select_sort') ? intval(Input::get('select_sort')) : 1,
            'input_diff' => Input::has('select_diff') ? intval(Input::get('select_diff')) : NULL,
            'input_limit' => $input_limit,
            'search_name' => Input::get('search_name'),
            'select_tree' => SB::option("SELECT * FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name'], TRUE),
            'select_mixture_dev' => SB::option("SELECT * FROM mixture_dev WHERE purpose = 'autosimple' OR purpose = 'devgroup' ORDER BY name", ['id' => '->name'], TRUE),
			'select_diff' => SB::option("SELECT * FROM prod_difference ORDER BY id", ['id' => '[->id] - ->name'], TRUE)
		]);
	}

    public function edit($tree = 0, $prod = 0)
    {
        Input::has("list_tree") ? $true_tree = Input::get("list_tree") : $true_tree = $tree;
        Input::has("list_prod") ? $true_prod = Input::get("list_prod") : $true_prod = $prod;

        if ($prod != $true_prod || $tree != $true_tree) {
            return Redirect::route('adm.product.prod.edit', ['tree' => $true_tree, 'prod' => $true_prod]);
        }

        $row = $this->prod
            ->where('tree_id', '=', $true_tree)
            ->where('id', '=', $true_prod)
            ->first();

        $select_tree = SB::option("SELECT tree.id,tree.absolute,tree.name FROM tree INNER JOIN tree_dev ON tree.id = tree_dev.tree_id AND tree_dev.dev_id = 1 WHERE dir_all > 0", ['id' => '[->id] - [->absolute] - ->name'], TRUE);
        $list_prod = SB::optionBind("SELECT id,mode_id,name,ic_all FROM prod WHERE tree_id = ?", [$tree], ['id' => '->name | [m:->mode_id] | [i:->ic_all]']);


        if (!isset($row->tree_id)) {

            return View::make('adm.product.prod.edit', [
                'list_tree' => $select_tree,
                'list_prod' => [''] + $list_prod,
                'choice_tree' => $tree,
                'choice_prod' => $prod
            ])->with(['id' => $prod]);

        } else {

            $select_akce_template = NULL;
            $dev_in_mixture = MixtureDevM2nDev::where('dev_id', '=', $row->dev_id)->lists('mixture_dev_id');

            if ($row->mode_id == 4 && count($dev_in_mixture) > 0) {
                $select_akce_template = SB::optionEloqent(AkceTempl::select(
                    [
                        DB::raw('(SELECT COUNT(akce.akce_id) FROM akce WHERE akce.akce_template_id = akce_template.id) AS akce_count'),
                        'akce_template.id AS akce_template_id',
                        'akce_template.bonus_title AS akce_template_bonus_title',
                        'akce_availability.name AS akce_availability_name',
                        'akce_minitext.name AS akce_minitext_name',
                        'mixture_dev.name AS mixture_dev_name'
                    ])
                    ->join('mixture_dev', 'akce_template.mixture_dev_id', '=', 'mixture_dev.id')
                    ->join('akce_availability', 'akce_template.availability_id', '=', 'akce_availability.id')
                    ->join('akce_minitext', 'akce_template.minitext_id', '=', 'akce_minitext.id')
                    ->where('akce_template.id', '>', '1')
                    ->get(), ['akce_template_id' => '[->mixture_dev_name] - [&#8721;=->akce_count] - [->akce_minitext_name] - [->akce_availability_name] - [Titulek: \'->akce_template_bonus_title\']'], TRUE);
            }

            return View::make('adm.product.prod.edit', [
                'list_tree' => $select_tree,
                'list_prod' => $list_prod,
                'choice_tree' => $tree,
                'choice_prod' => $prod,
                'prod' => $row,
                'select_dev' => SB::option("SELECT id,name FROM dev WHERE id > 1", ['id' => '[->id] - ->name']),
                'select_tree' => SB::option("SELECT id,name,absolute FROM tree WHERE deep > 0", ['id' => '[->id] - [->absolute] - ->name']),
                'select_warranty' => SB::option("SELECT id,name FROM prod_warranty", ['id' => '->name']),
                'select_dph' => SB::option("SELECT id,name FROM dph WHERE visible = 1", ['id' => '->name']),
                'select_mode' => SB::option("SELECT id,name FROM prod_mode WHERE visible = 1", ['id' => '->name']),
                'select_forex' => SB::option("SELECT id,currency FROM forex WHERE active = 1", ['id' => '->currency']),
                'select_sale' => SB::option("SELECT * FROM prod_sale WHERE visible = 1", ['id' => '->desc']),
                'select_difference' => SB::option("SELECT id,name,count FROM prod_difference WHERE visible = 1", ['id' => '->name [->count]']),
                'select_availability' => SB::option("SELECT id,name FROM items_availability WHERE visible = 1 AND id > 1", ['id' => '->name']),
                'select_availability_action' => SB::option("SELECT id,name FROM items_availability WHERE visible = 1", ['id' => '->name']),
                'select_media_var' => SB::option("SELECT id,name FROM media_variations WHERE type_id = 7", ['id' => '->name'], TRUE),
                'select_akce_template' => $select_akce_template,
                'select_akce_sale' => SB::optionEloqent(AkceSale::select(['id', 'desc'])->where('visible', '=', '1')->orderBy('id')->get(), ['id' => '->desc'], FALSE),
                'table_items' => $this->items->where('prod_id', '=', $prod)->get(),
                'table_prod_picture' => ProdPicture::where('prod_id', '=', $prod)->orderBy('id')->get(),
                'table_prod_description' => ProdDescription::where('prod_id', '=', $prod)->get()->toArray(),
                'table_prod_description_set' => ProdDifferenceM2nSet::where('difference_id', '=', $row->difference_id)->get(),
            ])->with(['id' => $prod]);
        }
    }

    public function update($tree, $prod)
    {
        $input = Input::all();
        $row = $this->prod->find($prod);


        if (Input::has('img-to-primary')) {
            foreach (array_keys(Input::get('img-to-primary')) as $key) {

                DB::transaction(function () use ($prod, $key) {
                    $prod = Prod::find($prod);
                    $img = ProdPicture::find($key);

                    $img_big = $prod->img_big;
                    $img_normal = $prod->img_normal;
                    $prod->img_big = $img->img_big;
                    $prod->img_normal = $img->img_normal;
                    $img->img_big = $img_big;
                    $img->img_normal = $img_normal;
                    $prod->save();
                    $img->save();
                });
            }
        }

        if (Input::has('img-to-delete')) {
            foreach (array_keys(Input::get('img-to-delete')) as $key) {
                ProdPicture::destroy($key);
                Session::flash('warning', "Obrázek byl odstraněn");
            }
        }

        if (Input::has("save-action")) {
            $ainput = array_only($input, ['akce_id', 'akce_prod_id', 'akce_sale_id', "akce_template_id", "akce_price"]);
            if (intval($ainput['akce_template_id']) > 1) {
                $akce = Akce::where('akce_id', '=', $ainput['akce_id'])->first();
                $akce->setKeyName('akce_id');
                $akce->update($ainput);
                $akce->save();
                Session::flash('success', "Akce byla uložena");
            } else {
                Session::flash('error', "Nebyla zadána šablona akce");
            }
            return Redirect::route('adm.product.prod.edit', [$tree, $prod, "#akce"]);
        }

        if (Input::hasFile('input-1a')) {
            $file = Input::file('input-1a')->getClientMimeType();
            if ($file == 'image/jpeg' || $file == 'image/png') {
                try {
                    $img = new ProdImage(Input::file('input-1a')->getPathname(), $row->tree->absolute, $row->name);
                    $img->createProdPictures(240, 240);
                    $aff = ProdPicture::create([
                        'prod_id' => $row->id,
                        'img_big' => $img->getImgBig(),
                        'img_normal' => $img->getImgNormal()
                    ]);
                    if ($aff) {
                        Session::flash('success', "Obrázek byl uploadován a zpracován: " . $img->getOutputPath());
                    }
                } catch (Exception $e) {
                    Session::flash('error', $e->getMessage());
                }
            }
            return Redirect::route('adm.product.prod.edit', [$tree, $prod, "#fotogalerie"]);
        }

        if ((Input::has('picture-work') && \URL::isValidUrl(Input::get('upload_url')))) {
            try {
                $img = new ProdImage(Input::get('upload_url'), $row->tree->absolute, $row->name);
                $img->createProdPictures(240, 240);
                $aff = ProdPicture::create([
                    'prod_id' => $row->id,
                    'img_big' => $img->getImgBig(),
                    'img_normal' => $img->getImgNormal()
                ]);
                if ($aff) {
                    Session::flash('success', "Obrázek byl zpracován a uložen: " . $img->getOutputPath());
                }
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.product.prod.edit', [$tree, $prod, "#fotogalerie"]);
        }

        if (Input::has('button-submit-edit')) {

            $input_prod = array_only($input, $this->prod_input_fields);
            $input_prod['id'] = $row->id;

            $rules = Prod::$rules;
            if ($row->id !== NULL) {
                $rules['name'] .= ",$row->id";
                $rules['desc'] .= ",$row->id";
                $rules['alias'] .= ",$row->id";
            }
            $v = Validator::make($input_prod, $rules);
            if ($v->passes()) {
                if (intval(Input::get('difference_check')) == 1 && Input::get('difference_id') != $row->difference_id) {
                    $this->items->where('prod_id', '=', $prod)->delete();
                    $row->difference_id = Input::get('difference_id');
                    $row->save();
                }
                try {
                    $row->update($input_prod, $tree);
                } catch (Exception $e) {
                    Session::flash('error', implode('<br />', $v->errors()->all(':message')));
                    return Redirect::route('adm.product.prod.edit', [$tree, $prod])->withInput()->withErrors($v);
                }
            }

            if (Input::has('code_ean')) {
                $input_items = array_only($input, $this->items_input_fields);
                foreach (array_keys(Input::get('code_ean')) as $key) {
                    $items = Items::find($key);
                    $items->visible = $input_items['visible'][$key];
                    $items->diff_val1_id = isset($input_items['diff_val1_id'][$key]) ? $input_items['diff_val1_id'][$key] : 1;
                    $items->diff_val2_id = isset($input_items['diff_val2_id'][$key]) ? $input_items['diff_val2_id'][$key] : 1;
                    $items->code_prod = $input_items['code_prod'][$key];
                    $items->code_ean = $input_items['code_ean'][$key];
                    $items->availability_id = $input_items['availability_id'][$key];
                    $items->save();
                }
            }

            $ida1 = array_only($input, ['data_id1', 'data_title1', 'data_input1']);
            if (intval($ida1['data_title1']) == 0 && intval($ida1['data_id1']) > 0) {
                ProdDescription::destroy(intval($ida1['data_id1']));
            } elseif (strlen($ida1['data_input1']) > 0 && intval($ida1['data_id1']) == 0) {
                ProdDescription::create([
                    "prod_id" => $prod,
                    "variations_id" => intval($ida1['data_title1']),
                    "data" => $ida1['data_input1']
                ]);
            } elseif (isset($ida1['data_title1']) && isset($ida1['data_input1']) && strlen($ida1['data_input1']) > 0 && intval($ida1['data_title1']) > 0) {
                $pd1 = ProdDescription::find(intval($ida1['data_id1']));
                $pd1->variations_id = intval($ida1['data_title1']);
                $pd1->data = $ida1['data_input1'];
                $pd1->save();
            }

            $ida2 = array_only($input, ['data_id2', 'data_title2', 'data_input2']);
            if (intval($ida2['data_title2']) == 0 && intval($ida2['data_id2']) > 0) {
                ProdDescription::destroy(intval($ida2['data_id2']));
            } elseif (strlen($ida2['data_input2']) > 0 && intval($ida2['data_id2']) == 0) {
                ProdDescription::create([
                    "prod_id" => $prod,
                    "variations_id" => intval($ida2['data_title2']),
                    "data" => $ida2['data_input2']
                ]);
            } elseif (isset($ida2['data_title2']) && isset($ida2['data_input2']) && strlen($ida2['data_input2']) > 0 && intval($ida2['data_title2']) > 0) {
                $pd2 = ProdDescription::find(intval($ida2['data_id2']));
                $pd2->variations_id = intval($ida2['data_title2']);
                $pd2->data = $ida2['data_input2'];
                $pd2->save();
            }

            $ida3 = array_only($input, ['data_id3', 'data_title3', 'data_input3']);
            if (intval($ida3['data_title3']) == 0 && intval($ida3['data_id3']) > 0) {
                ProdDescription::destroy(intval($ida3['data_id3']));
            } elseif (strlen($ida3['data_input3']) > 0 && intval($ida3['data_id3']) == 0) {
                ProdDescription::create([
                    "prod_id" => $prod,
                    "variations_id" => intval($ida3['data_title3']),
                    "data" => $ida3['data_input3']
                ]);
            } elseif (isset($ida3['data_title3']) && isset($ida3['data_input3']) && strlen($ida3['data_input3']) > 0 && intval($ida3['data_title3']) > 0) {
                $pd3 = ProdDescription::find(intval($ida3['data_id3']));
                $pd3->variations_id = intval($ida3['data_title3']);
                $pd3->data = $ida3['data_input3'];
                $pd3->save();
            }
        }

        if (Input::has('button-add-variation') && Input::has('variation')) {
            $i = 0;
            if (count(Input::get('variation')) == $row->prodDifference->count && count(Input::get('variation')) > 0) {
                $variation = Input::get('variation');
                foreach (array_keys(Input::get('variation')) as $key) {
                    $arr[$i++] = $key;
                }

                if (count($arr) == 1) {
                    foreach ($variation[$arr[0]] as $v1) {

                        $count = Items::where('prod_id', '=', $row->id)->where('diff_val1_id', '=', $v1)->where('diff_val2_id', '=', 1)->count();
                        if ($count == 0) {
                            Items::create([
                                'prod_id' => $row->id,
                                'sale_id' => $row->dev->default_sale_prod_id,
                                'availability_id' => $row->dev->default_availability_id,
                                'diff_val1_id' => $v1,
                                'diff_val2_id' => 1,
                                'created_at' => date("Y-m-d H:i:s", strtotime('now')),
                                'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
                            ]);
                        }
                    }
                } elseif (count($arr) == 2) {
                    foreach ($variation[$arr[0]] as $v1) {
                        foreach ($variation[$arr[1]] as $v2) {

                            $count = Items::where('prod_id', '=', $row->id)->where('diff_val1_id', '=', $v1)->where('diff_val2_id', '=', 1)->count();
                            if ($count == 0) {
                                Items::create([
                                    'prod_id' => $row->id,
                                    'sale_id' => $row->dev->default_sale_prod_id,
                                    'availability_id' => $row->dev->default_availability_id,
                                    'diff_val1_id' => $v1,
                                    'diff_val2_id' => $v2,
                                    'created_at' => date("Y-m-d H:i:s", strtotime('now')),
                                    'updated_at' => date("Y-m-d H:i:s", strtotime('now'))
                                ]);
                            }
                        }
                    }
                }
            }
            return Redirect::route('adm.product.prod.edit', [$tree, $prod]);
        }
        return Redirect::route('adm.product.prod.edit', [$tree, $prod]);
    }
}