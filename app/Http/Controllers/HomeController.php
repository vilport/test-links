<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;

class HomeController extends Controller
{
    public function index()
    {
        // pass app name as title to javascript (window.title)
        JavaScript::put([
            'title' => config('app.name')
        ]);

        return view('home');
    }
}
