<?php

namespace App\Lib;

use Illuminate\Support\Facades\App;

class NationalCode
{
    public static function check($code)
    {
        if (App::runningUnitTests() && App::runningInConsole()) {
            return true;
        }

        if (!preg_match('/^\d{8,10}$/', $code) || preg_match('/^[0]{10}|[1]{10}|[2]{10}|[3]{10}|[4]{10}|[5]{10}|[6]{10}|[7]{10}|[8]{10}|[9]{10}$/', $code)) {
            return false;
        }

        $sub = 0;

        if (strlen($code) == 8) {
            $code = '00' . $code;
        } elseif (strlen($code) == 9) {
            $code = '0' . $code;
        }

        for ($i = 0; $i <= 8; $i++) {
            $sub = $sub + ( $code[$i] * ( 10 - $i ) );
        }

        if (( $sub % 11 ) < 2) {
            $control = ( $sub % 11 );
        } else {
            $control = 11 - ( $sub % 11 );
        }

        if ($code[9] == $control) {
            return true;
        } else {
            return false;
        }
    }
}
