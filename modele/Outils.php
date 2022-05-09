<?php

class Outils {

    public static function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool {
        return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
    }

    public static function showArrayJS($array) {

        $out = "[";

        for ($i = 0; $i <= count($array) - 1; $i++) {
            $out = $out . "'" . $array[$i]["date"] . "', ";
        }

        $out = $out . "]";
        $out = substr_replace($out, '', -3, 1);
        return substr_replace($out, '', -2, 1);

    }

    public static function reverseDate($date) {
        $table = explode("-", $date);

        return $table[2] . "/" . $table[1] . "/" . $table[0];
    }
}