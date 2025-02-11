<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function cleanUpperCaseString($string) : string {
        //remove os espaços a mais e tranforma em upper
        return strtoupper(trim($string));
    }
}
