<?php

namespace Mnemesong\Microwidget\helpers;

class PrevTabsClearHelpers
{
    public static function clear(string $text): string
    {
        $stringsArr = explode("\n", $text);
        //Clear empty strings
        $stringsArr = array_filter($stringsArr, fn(string $str)
        => (preg_match('/^[\s]*$/', $str) !== 1));
        //Get minimal count of spacebars at start of every string
        $minSpaces = min(array_map(function (string $str) {
            $matches = [];
            preg_match('/\S\S*.*$/', $str, $matches);
            if(!isset($matches[0])) {
                return 0;
            }
            return mb_strlen($str) - mb_strlen($matches[0]);
        }, $stringsArr));
        $minSpaces = intval($minSpaces);
        //Remove minimal count of first spacebars from every string
        $stringsArr = array_map(function (string $str) use ($minSpaces) {
            return mb_substr($str, $minSpaces);
        }, $stringsArr);
        $result = implode("\n", $stringsArr);
        return trim($result, "\n\r");
    }
}