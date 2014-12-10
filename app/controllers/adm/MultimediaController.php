<?php

use Authority\Eloquent\MediaDb;
use Authority\Eloquent\MediaVariations;
use Authority\Tools\SB;

class MultimediaController extends \BaseController
{
    public function index()
    {
        return View::make('adm.pattern.multimedia.index', [
            'media' => MediaDb::select(["media_db.*"])->join('media_variations', 'media_db.variations_id', '=', 'media_variations.id')
                ->where('visible_media', '=', '1')
                ->orderBy('media_db.id')
                ->paginate(40),
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
                ->where('visible_media', '=', '1')->get(), ['media_variations_id' => '[->media_type_name] - ->media_variations_name'], true)
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
            'media' => $media
        ]);
    }

    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
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
