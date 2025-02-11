<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function initMethod(): string
    {
        return "Hello Word";
    }

    public function homePage() : View{
        return view('home');
    }
}
