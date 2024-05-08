<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function menu()
    {
        return view('frontend.menu');
    }

    public function about()
    {
        return view('frontend.about');
    }
}
