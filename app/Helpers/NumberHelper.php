<?php


namespace App\Helpers;

class NumberHelper
{
    public static function ConvertBrazilianFormatToFloat(string $valor): float
    {
        $valor = str_replace(",",".", str_replace(".","",$valor));
        return floatval($valor);
    }
}
