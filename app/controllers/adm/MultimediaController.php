<?php

use Authority\Eloquent\MediaDb;
use Authority\Eloquent\MediaVariations;
use Authority\Eloquent\MixtureDev;
use Authority\Eloquent\MixtureProd;
use Authority\Tools\SB;

class MultimediaController extends \BaseController
{
    public function index()
    {
        $choice_limit = intval(Input::get('select_limit'));
        $choice_variations = intval(Input::get('select_variations'));
        $media = MediaDb::select(["media_db.*"])->join('media_variations', 'media_db.variations_id', '=', 'media_variations.id');

        if ($choice_variations > 0) {
            $media->where('media_variations.id', '=', $choice_variations);
        }

        return View::make('adm.pattern.multimedia.index', [
            'media'             => $media->where('visible_media', '=', '1')->orderBy('media_db.id')->paginate($choice_limit == 0 ? 20 : $choice_limit),
            'choice_limit'      => $choice_limit,
            'choice_variations' => $choice_variations,
            'select_variations' => SB::optionEloqent(MediaVariations::where('visible_media', '=', '1')->orderByRaw('tag,id')->get(), ['id' => '[->tag] - ->name'], TRUE)
        ]);
    }

    public function show($id)
    {
        return View::make('adm.pattern.multimedia.show', [
            'media' => MediaDb::find($id)
        ]);
    }

    public function create()
    {
        return View::make('adm.pattern.multimedia.create', [
            'select_variations' => SB::optionEloqent(MediaVariations::select([
                'media_variations.id AS media_variations_id',
                'media_variations.name AS media_variations_name',
                'media_type.name AS media_type_name'
            ])->join('media_type', 'media_variations.type_id', '=', 'media_type.id')
                ->where('visible_media', '=', '1')->get(), ['media_variations_id' => '[->media_type_name] - ->media_variations_name'], TRUE)
        ]);
    }

    public function store()
    {
        $input = Input::all();
        $v = Validator::make($input, MediaDb::$rules);

        if ($v->passes()) {
            MediaDb::create(Input::all());
            Session::flash('success', 'Nové multimedium bylo přidáno');
            return Redirect::route('adm.pattern.multimedia.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.multimedia.create')->withInput()->withErrors($v);
        }
    }

    public function edit($id)
    {
        $media = MediaDb::find($id);
        if (is_null($media)) {
            return Redirect::route('adm.pattern.multimedia.index');
        }

        return View::make('adm.pattern.multimedia.edit', [
            'media'               => $media,
            'select_mixture_dev'  => SB::optionEloqent(MixtureDev::whereIn('purpose', ['multimedia', 'autosimple'])->get(), ['id' => '->name'], TRUE),
            'select_mixture_prod' => SB::optionEloqent(MixtureProd::whereIn('purpose', ['multimedia'])->get(), ['id' => '->name'], TRUE),
        ]);
    }

    public function update($id)
    {

        $input = array_except(Input::all(), '_method');
        if (empty($input['mixture_dev_id'])) {
            $input['mixture_dev_id'] = NULL;
        }
        if (empty($input['mixture_prod_id'])) {
            $input['mixture_prod_id'] = NULL;
        }

        $v = Validator::make($input, MediaDb::$rules);

        if ($v->passes()) {
            $media = MediaDb::find($id);
            try {
                $media->update($input);
            } catch (Exception $e) {
                Session::flash('error', $e->getMessage());
            }
            return Redirect::route('adm.pattern.multimedia.index');
        } else {
            Session::flash('error', implode('<br />', $v->errors()->all(':message')));
            return Redirect::route('adm.pattern.multimedia.edit', $id)->withInput()->withErrors($v);
        }
    }

    public function destroy($id)
    {
        MediaDb::destroy($id);
        Session::flash('warning', 'Záznam byl odstraněn');
        return Redirect::route('adm.pattern.multimedia.index');
    }
}
