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

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function stuff()
    {
        return view('frontend.stuff');
    }

    public function reservation()
    {
        return view('frontend.reservation');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function blog()
    {
        return view('frontend.blog');
    }
}
