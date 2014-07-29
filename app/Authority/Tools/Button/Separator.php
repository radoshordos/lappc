<?php namespace Authority\Tools\Button;

class Separator
{
    static function getSeparatorString($name)
    {
        switch ($name) {
            case 'tab':
                return "\t";
            case 'semicolon':
                return ";";
            default :
                return "";
        }

    }
}

