<?php

namespace App\Helpers;

class Helper
{
    const ITEM_PER_PAGE = 10;

    static function trim_text($text, $limit = 20)
    {
        $text = strip_tags($text);
        if (str_word_count($text) > $limit) {
            $arrText = self::multiexplode($limit, [' ', '&nbsp;'], $text);
            unset($arrText[$limit - 1]);
            return implode(' ', $arrText) . '...';
        }

        return $text;
    }


    static function multiexplode($limit, $delimiters = array(), $string = '')
    {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready, $limit);

        return $launch;
    }
}
