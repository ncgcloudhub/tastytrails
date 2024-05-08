<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{

    // About Us BACKEND
    public function ManageAboutUs()
    {
        $about_us = AboutUs::orderBy('id', 'asc')->get();
        return view('backend.about.add_about_us', compact('about_us'));
    }

    public function StoreAboutUs(Request $request)
    {

        $about_us = AboutUs::create([
            'title' => $request->title,
            'details' => $request->details
        ]);

        return redirect()->back();
    }

    public function EditAboutUs($id)
    {
        $about_us = AboutUs::orderBy('id', 'asc')->get();
        $about_uss = AboutUs::findOrFail($id);

        return view('backend.about.edit_about_us', compact('about_us', 'about_uss'));
    }


    public function UpdateAboutUs(Request $request)
    {

        AboutUs::findOrFail($request->id)->update([
            'details' => $request->details,
        ]);

        $notification = array(
            'message' => 'Conditions Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect(route('manage.terms.condition'))->with($notification);
    }
}
