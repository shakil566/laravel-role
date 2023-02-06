<?php

namespace App\Helpers;
class Helper
{
    public static function upperCase(string $string)
    {
        return strtoupper($string);
    }
    public function stringToArrayToName(string $string, array $modelArr): string
    {
        $text = "";

        if (empty($string) || empty($modelArr)) {
            return $text;
        }
        if (!empty($string)) {
            foreach (explode(',', $string) as $key => $value) {
                $text .= !empty($modelArr[$value]) ? $modelArr[$value] . ' , ' : ' ';
            }
            $text = trim($text, ' , ');
        }
        return $text;
    }

}
