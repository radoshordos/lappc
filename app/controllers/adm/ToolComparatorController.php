<?php

class ToolComparatorController extends \BaseController
{
    public function index()
    {

        $one = $this->toArr(Input::get('one'));
        $two = $this->toArr(Input::get('two'));

        return View::make('adm.tools.comparator.index', array(
            'one' => Input::get('one'),
            'two' => Input::get('two'),
            'diff' => $this->toStr(array_diff($one,$two)),
            'intersect' => $this->toStr(array_intersect($one,$two)),
            'diff_count' => count(array_diff($one,$two)),
            'intersect_count' => count(array_intersect($one,$two))
        ));
    }

    private function toArr($str) {
        return explode("\r\n",$str);
    }

    private function toStr(array $arr) {
        return implode("\r\n",$arr);
    }
}