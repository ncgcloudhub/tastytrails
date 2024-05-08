<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home()
    {
        $banners = Banner::latest()->limit(3)->get();
        return view('frontend.home', compact('banners'));
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
