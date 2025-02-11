<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller
{
    public function __invoke(Request $request): void
    {
        echo "single";
        echo "<br>";
        echo $this->privateMethod();
    }

    private function privateMethod() : string {
        return "Private Method";
    }
}
