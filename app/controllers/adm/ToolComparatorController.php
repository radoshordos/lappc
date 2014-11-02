<?php

class ToolComparatorController extends \BaseController
{
    public function index()
    {
        $one = $this->toArr(Input::get('one'));
        $two = $this->toArr(Input::get('two'));
        $diff = array_filter(array_diff($one, $two));
        $intersect = array_filter(array_intersect($one, $two));

        return View::make('adm.tools.comparator.index', [
            'one'             => Input::get('one'),
            'two'             => Input::get('two'),
            'diff'            => $this->toStr($diff),
            'intersect'       => $this->toStr($intersect),
            'diff_count'      => count($diff),
            'intersect_count' => count($intersect)
        ]);
    }

    private function toArr($str)
    {
        return explode("\r\n", $str);
    }

    private function toStr(array $arr)
    {
        return trim(implode("\r\n", $arr));
    }
}