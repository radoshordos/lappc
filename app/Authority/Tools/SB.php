<?php

namespace Authority\Tools;

class SB
{

    static function option($query, array $assoc_bind)
    {

        $col = [];
        $key = [];
        $val = [];

        foreach ($assoc_bind as $k => $v) {
            $col[0] = '$row->' . trim($k);
            $col[1] = str_replace(array('->'), '$row->', trim($v));
        }

        $results = \DB::select($query);

        foreach ($results as $row) {
            eval("\$key[] = \"$col[0]\";");
            eval("\$val[] = \"$col[1]\";");
        }

        return array_combine($key, $val);
    }

}