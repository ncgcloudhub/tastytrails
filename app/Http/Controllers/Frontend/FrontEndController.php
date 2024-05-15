<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    // Mail
    public function sendEmail(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'messageBody' => $request->input('message') // Changed key to 'messageBody'
        ];

        Mail::send('backend.layouts.email_test', $data, function ($message) use ($data) {
            $message->to('ifazalam9@gmail.com')
                ->subject('New message from contact form'); // Use a static subject or another field, not the message body
        });

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
