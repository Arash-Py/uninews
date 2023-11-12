<?php

use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Carbon;

if (!function_exists('convertPhone')) {
    function convertPhone($phone): string
    {
        return substr($phone, -10);
    }
}

if (!function_exists("convert_persian_english")) {
    function convert_persian_english($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }
}

if (!function_exists('shamsiToGregorianDate')) {
    function shamsiToGregorianDate($date)
    {
        if ($date == null) {
            return null;
        }
        $pattern = "/[\/\s]/";

        $shamsiDateSplit = preg_split($pattern, $date);
        $arrayGergorianDate = Verta::jalaliToGregorian(
            convert_persian_english($shamsiDateSplit[0]),
            convert_persian_english($shamsiDateSplit[1]),
            convert_persian_english($shamsiDateSplit[2]),
        );

        return implode("-", $arrayGergorianDate);
    }
}
if (!function_exists('GregorianToShamsi')) {
    function GregorianToShamsi($date)
    {
        if ($date == null) {
            return null;
        }
        $pattern = "/[\/\s]/";

        $shamsiDateSplit = preg_split($pattern, $date);
        $arrayGergorianDate = Verta::GregorianToJalali($shamsiDateSplit[0], $shamsiDateSplit[1], $shamsiDateSplit[2]);

        return implode("-", $arrayGergorianDate);
    }

    if (!function_exists('phone_number_format')) {
        function phone_number_format($phone)
        {
            return preg_match("/^09[0-9]{9}$/", $phone) ? substr($phone, 1) : $phone;
        }
    }
}

if (!function_exists('phone_number_format')) {
    function phone_number_format($phone)
    {
        return preg_match("/^09[0-9]{9}$/", $phone) ? substr($phone, 1) : $phone;
    }
}

if (!function_exists("persian_to_gregorian")) {
    function persian_to_gregorian($time, $flag = true)
    {
        list($year, $month, $day) = explode('/', $time);
        $year   = convert_persian_english($year);
        $month  = convert_persian_english($month);
        $day = convert_persian_english($day);
        $start_time = Verta::jalaliToGregorian($year, $month, $day);
        if ($flag)
            return Carbon::create($start_time[0], $start_time[1], $start_time[2]);
        return Carbon::create($start_time[0], $start_time[1], $start_time[2], 11, 59, 59);
    }
}
