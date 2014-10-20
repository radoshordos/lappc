<?php

namespace Authority\Tools;

class SB
{

    static function optionBind($query, $query_bind, array $assoc_bind, $first_empty = FALSE)
    {

        $col = [];
        $key = [];
        $val = [];

        foreach ($assoc_bind as $k => $v) {
            $col[0] = '$row->' . trim($k);
            $col[1] = str_replace(['->'], '$row->', trim($v));
        }

        $results = \DB::select($query, $query_bind);

        foreach ($results as $row) {
            eval("\$key[] = \"$col[0]\";");
            eval("\$val[] = \"$col[1]\";");
        }

        if ($first_empty === TRUE) {
            return ['' => '&nbsp;'] + array_combine($key, $val);
        }
        return array_combine($key, $val);
    }


    static function option($query, array $assoc_bind, $first_empty = FALSE)
    {

        $col = [];
        $key = [];
        $val = [];

        foreach ($assoc_bind as $k => $v) {
            $col[0] = '$row->' . trim($k);
            $col[1] = str_replace(['->'], '$row->', trim($v));
        }

        $results = \DB::select($query);

        foreach ($results as $row) {
            eval("\$key[] = \"$col[0]\";");
            eval("\$val[] = \"$col[1]\";");
        }

        if ($first_empty === TRUE) {
            return ['' => '&nbsp;'] + array_combine($key, $val);
        }
        return array_combine($key, $val);
    }

}